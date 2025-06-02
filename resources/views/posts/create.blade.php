<x-layout.main>
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{route('posts.store')}}" method="POST">
        @csrf
        <div class="field">
            <label for="title" class="label">Title</label>
            <input type="text" name="title" class="input has-background-white" style="color:black"
                   value="{{old('title')}}">
        </div>

        <div class="field">
            <label for="excerpt" class="label">Excerpt</label>
            <input type="text" name="excerpt" class="input has-background-white" style="color:black"
                   value="{{old('excerpt')}}">
        </div>

        <div class="field">
            <label for="body" class="label">Body</label>
            <input type="text" name="body" class="input has-background-white" style="color:black"
                   value="{{old('body')}}">
        </div>

        <br>
        <button type="submit" class="button is-primary">Submit</button>
        <a href="{{route('posts.index')}}" class="button is-danger">Cancel</a>
    </form>


</x-layout.main>
