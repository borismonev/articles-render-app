<x-layout.main>
    @if($errors->any())
        <ul>
            @foreach($errors->all() as $error)
                <li>{{$error}}</li>
            @endforeach
        </ul>
    @endif
    <form action="{{route('posts.update', ['post' => $post])}}" method="POST">
        @csrf
        @method('PUT')
        <div class="field">
            <label for="title" class="label">Title</label>
            <input type="text" name="title" class="input has-background-white" style="color:black"
                   @if(old('title') != null)
                       value="{{old('title')}}"
                   @else
                       value="{{$post->title}}"
                @endif
            >
        </div>

        <div class="field">
            <label for="excerpt" class="label">Excerpt</label>
            <input type="text" name="excerpt" class="input has-background-white" style="color:black"
                   @if(old('excerpt') != null)
                       value="{{old('excerpt')}}"
                   @else
                       value="{{$post->excerpt}}"
                @endif
            >
        </div>

        <div class="field">
            <label for="body" class="label">Body</label>
            <input type="text" name="body" class="input has-background-white" style="color:black"
                   value="{{(old('body') ? old('body') : $post->body)}}"
            >
        </div>

        <br>
        <button type="submit" class="button is-primary">Submit</button>
        <a href="{{route('posts.show', ['post' => $post])}}" class="button is-danger">Cancel</a>
    </form>


</x-layout.main>
