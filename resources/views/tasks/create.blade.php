<x-layout.main>
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        <br>
    @endif

    <form method="POST" action="{{route('tasks.store')}}">
        @csrf
        <div class="field">
            <label for="title" class="label">Title</label>
            <input type="text" class="input" name="title" value="{{old('title')}}">
        </div>

        <div class="field">
            <label for="description" class="label">Description</label>
            <input type="text" class="input" name="description" value="{{old('description')}}">
        </div>

        <div class="field">
            <label for="priority" class="label">Priority</label>
            <input type="text" class="input" name="priority" value="{{old('priority')}}">
        </div>

        <div class="field">
            <label for="state" class="label">State</label>
            <select class="select input" name="state">
                <option>new</option>
                <option>deferred</option>
                <option>cancelled</option>
                <option>planned</option>
                <option>in progress</option>
                <option>on hold</option>
                <option>completed</option>
            </select>
        </div>

        <div class="field">
            <label for="time_estimated" class="label">Time Estimated</label>
            <input type="text" class="input" name="time_estimated" value="{{old('time_estimated')}}">
        </div>

        <div class="field">
            <label for="time_spent" class="label">Time Spent</label>
            <input type="text" class="input" name="time_spent" value="{{old('time_spent')}}">
        </div>

        <div class="field">
            <label for="completed_at" class="label">Completed At</label>
            <input type="text" class="input" name="completed_at" value="{{old('completed_at')}}">
        </div>

        <div class="field">
            <label for="project_id" class="label">Project ID</label>
            <select name="project_id" class="select">
                <option value='{{null}}'>No project</option>
                @foreach(\App\Models\Project::all()->sortBy('title') as $project)
                    <option value="{{$project->id}}">{{$project->title}}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="button has-background-primary">Submit</button>
        <a href="{{route('home')}}" class="button has-background-danger">Cancel</a>
    </form>
</x-layout.main>
