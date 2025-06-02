<x-layout.main>
    <h1 class="is-size-3">Blog
        <a href="{{route('posts.create')}}" class="button is-primary" style="margin-top:8px; margin-left:10px">Create
            Post</a>
    </h1>
    <br>
    @foreach($posts as $post)
        <x-layout.item :post="$post">$post</x-layout.item>
    @endforeach
</x-layout.main>
