<article class="media">
    <div class="media-content">
        <div class="content">
            <a href="{{ route('posts.show', $post['id']) }}">
                {{ $post['title'] }}
            </a>
            <br>
            <div>
        <span>
            {!! $post['excerpt'] !!}
        </span>
            </div>
            <div>
        <span>
            {!! $post['created_at'] !!}
        </span>
            </div>

        </div>
    </div>
    <div class="media-right">
    </div>
</article>
