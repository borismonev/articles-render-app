<x-layout.main>
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{route('projects.update', ['project' => $project])}}" method="POST">
        @csrf
        @method('PUT')
        <div class="field">
            <label for="title" class="label">Title</label>
            <input type="text" name="title" class="input has-background-white" style="color:black"
                   @if(old('title') != null)
                       value="{{old('title')}}"
                   @else
                       value="{{$project->title}}"
                @endif
            >
        </div>

        <div class="field">
            <label for="description" class="label">Description</label>
            <input type="text" name="description" class="input has-background-white" style="color:black"
                   @if(old('excerpt') != null)
                       value="{{old('description')}}"
                   @else
                       value="{{$project->description}}"
                @endif
            >
        </div>

        <br>
        <button type="submit" class="button is-primary">Submit</button>
        <a href="{{route('projects.show', ['project' => $project])}}" class="button is-danger">Cancel</a>
    </form>


</x-layout.main>
