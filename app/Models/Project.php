<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Support\Carbon;

class Project extends Model
{
    use hasFactory;

    protected $fillable = ['title', 'description'];

    public function tasks(): hasMany
    {
        return $this->hasMany(Task::class);
    }

    public function tasksCount(): Attribute
    {
        return Attribute::get(function () {
            return count($this->tasks);
        });
    }

    public function tasksTimeSpent(): Attribute
    {
        return Attribute::get(function () {
            if ($this->tasks->sum('time_spent') != null) {
                return $this->tasks->sum('time_spent');
            } else {
                return null;
            }
        });
    }

    public function tasksTimeEstimated(): Attribute
    {
        return Attribute::get(function () {
            if ($this->tasks->sum('time_estimated') != null) {
                return $this->tasks->sum('time_estimated');
            } else {
                return null;
            }
        });
    }

    public function highestPriority(): Attribute
    {
        return Attribute::get(function () {
            if ($this->tasks->count() != 0) {
                return $this->tasks()->where('state', '!=', 'completed')->orderBy('priority', 'desc')->first()->priority;
            } else {
                return null;
            }
        });
    }

    public function state(): Attribute
    {
        return Attribute::get(function () {
            if (count($this->tasks) == 0) {
                return null;
            } else if (count($this->tasks) == 1) {
                return $this->tasks->first()->state;
            } else if (count($this->tasks->where('state', '==', 'new')) == count($this->tasks)) {
                return 'new';
            } else if (count($this->tasks->where('state', '==', 'cancelled')) == count($this->tasks)) {
                return 'cancelled';
            } else if (count($this->tasks->whereIn('state', ['cancelled', 'completed'])) == count($this->tasks)) {
                return 'completed';
            } else if (count($this->tasks->whereIn('state', ['deferred', 'completed', 'cancelled'])) == count($this->tasks)) {
                return 'deferred';
            } else if (count($this->tasks->whereIn('state', ['on hold', 'new', 'completed', 'cancelled'])) == count($this->tasks)) {
                return 'on hold';
            } else if (count($this->tasks->whereIn('state', ['planned', 'new', 'completed', 'cancelled'])) == count($this->tasks)) {
                return 'planned';
            } else {
                return 'in progress';
            }
        });
    }

    public function completedAt(): Attribute
    {
        return Attribute::get(function () {
            $state = $this->state;

            if ($state == 'completed') {
                return Carbon::now();
            } else {
                return 'not completed';
            }
        });
    }

    public function tasksCompleted(): Attribute
    {
        return Attribute::get(function () {
            if ($this->tasks) {
                return count($this->tasks->where('state', '==', 'completed')) . '/' . count($this->tasks);
            } else {
                return 0;
            }
        });
    }
}
