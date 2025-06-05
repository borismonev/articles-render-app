<x-layout.main>
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        <br>
    @endif

    <form method="POST" action="{{route('tasks.update', ['task' => $task])}}">
        @csrf
        @method('PUT')
        <div class="field">
            <label for="title" class="label">Title</label>
            <input type="text" class="input" name="title" value="{{old('title') ? old('title') : $task->title}}">
        </div>

        <div class="field">
            <label for="description" class="label">Description</label>
            <input type="text" class="input" name="description"
                   value="{{old('description') ? old('description') : $task->description}}">
        </div>

        <div class="field">
            <label for="priority" class="label">Priority</label>
            <input type="text" class="input" name="priority"
                   value="{{old('priority') ? old('priority') : $task->priority}}">
        </div>

        <div class="field">
            <label for="state" class="label">State</label>
            <select class="select input" name="state">
                <option {{$task->state == 'new' ? 'selected' : ''}}>new</option>
                <option {{$task->state == 'deferred' ? 'selected' : ''}}>deferred</option>
                <option {{$task->state == 'cancelled' ? 'selected' : ''}}>cancelled</option>
                <option {{$task->state == 'planned' ? 'selected' : ''}}>planned</option>
                <option {{$task->state == 'in progress' ? 'selected' : ''}}>in progress</option>
                <option {{$task->state == 'on hold' ? 'selected' : ''}}>on hold</option>
                <option {{$task->state == 'completed' ? 'selected' : ''}}>completed</option>
            </select>
        </div>

        <div class="field">
            <label for="time_estimated" class="label">Time Estimated</label>
            <input type="text" class="input" name="time_estimated"
                   value="{{old('time_estimated') ? old('time_estimated') : $task->time_estimated}}">
        </div>

        <div class="field">
            <label for="time_spent" class="label">Time Spent</label>
            <input type="text" class="input" name="time_spent"
                   value="{{old('time_spent') ? old('time_spent') : $task->time_spent}}">
        </div>

        <div class="field">
            <label for="completed_at" class="label">Completed At</label>
            <input type="text" class="input" name="completed_at"
                   value="{{old('completed_at') ? old('completed_at') : $task->completed_at}}">
        </div>

        <div class="field">
            <label for="project_id" class="label">Project ID</label>
            <select name="project_id" class="select">
                <option value='{{null}}'>No project</option>
                @foreach(\App\Models\Project::all()->sortBy('title') as $project)
                    @if($project->id == $task->project_id)
                        {
                        <option value="{{$project->id}}" selected>{{$project->title}}</option>
                    @else
                        <option value="{{$project->id}}">{{$project->title}}</option>
                    @endif
                @endforeach
            </select>
        </div>

        <button type="submit" class="button has-background-primary">Submit</button>
        <a href="{{route('home')}}" class="button has-background-danger">Cancel</a>
    </form>
</x-layout.main>
