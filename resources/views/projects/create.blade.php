<x-layout.main>
    <h1 class="title">Create new project</h1>
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
        <br>
    @endif

    <form action="{{route('projects.store')}}" method="POST">
        @csrf
        <div class="field">
            <label for="title" class="label">Title</label>
            <input type="text" name="title" class="input"
                   value="{{old('title') ? old('title') : ''}}">
        </div>

        <div class="field">
            <label for="description" class="label">Description</label>
            <input type="text" name="description" class="input">
        </div>

        <button type=submit class="button has-background-success">Submit</button>
    </form>
</x-layout.main>
