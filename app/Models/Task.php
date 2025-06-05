<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Support\Carbon;

class Task extends Model
{
    use hasFactory;

    protected $fillable = ['title', 'description', 'priority', 'state', 'time_estimated', 'time_spent', 'completed_at'];

    public function getProgress()
    {
        return round(($this->time_spent / $this->time_estimated) * 100, 1);
    }

    public function getExpectedCompletedAt()
    {
        if ($this->time_spent == 0 || round(Carbon::now()->diffInDays($this->created_at)) == 0) {
            return null;
        } else {
            $timePassed = round(Carbon::now()->diffInDays($this->created_at)) * -1;

            $pace = $this->time_spent / $timePassed;

            $remainingTime = round(($this->time_estimated - $this->time_spent) / $pace);

            return $remainingTime;
        }
    }

    public function getSwagAttribute()
    {
        return $this->time_spent + $this->time_estimated;
    }

    public function yo(): Attribute
    {
        return Attribute::get(function () {
            return $this->time_spent - $this->time_estimated;
        });
    }

    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class);
    }
}
