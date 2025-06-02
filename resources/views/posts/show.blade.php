<x-layout.main>
    <div>
        <x-layout.returnButton>{{route('posts.index')}}</x-layout.returnButton>
    </div>
    <br>
    <div class="title-container">
        <span class="has-text-weight-bold has-text-primary" style="display: flex">
    {{$post->title}}
                    <a href="{{route('posts.edit', ['post' => $post])}}" class="button has-background-success"
                       style="margin-left: 10px; margin-top: -5px">Edit</a>
            <button class="js-modal-trigger has-background-danger button" data-target="modal-js"
                    style="margin-left: 10px; margin-top: -5px">Delete</button>

        </span>
    </div>
    <br>
    <div class="content">
        {!! $post['body'] !!}
    </div>
    <div>
        Created at: {{$post->created_at}}
        <br>
        Updated at: {{$post->updated_at}}
    </div>
    <br>
    <br>
    <div>
        <h1 class="has-text-primary has-text-weight-bold">Comments:</h1>
        @foreach($post->comments->sortByDesc('created_at') as $comment)
            <div class="box is-clipped">
                {{$comment->content}}
                <br>
                {{$comment->created_at}}
            </div>
        @endforeach
    </div>
    <br>
    <br>
    <div>
        <h1 class="has-text-primary has-text-weight-bold">Add new comment</h1>
        <form action="{{route('posts.storeComment', ['post' => $post])}}" method="POST">
            @csrf
            <div class="field">
                <textarea class="textarea has-background-white has-text-black" name="content" rows="4"></textarea>
            </div>
            <div class="has-text-right-desktop">
                <button class="button has-background-success">Submit</button>
            </div>
        </form>
    </div>


    <div class="modal" id="modal-js">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Are you sure you want to delete this post?</p>
                <button class="delete" aria-label="close"></button>
            </header>
            <section class="modal-card-body is-clipped">
                <p class="image is-4by3">
                    <img
                        src="{{asset("images/shocked-black-guy.gif")}}" alt="">
                </p>
            </section>
            <footer class="modal-card-foot">
                <form action="{{route('posts.destroy', ['post' => $post])}}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="button has-background-danger">DELETE</button>
                </form>
            </footer>
        </div>
        <button class="modal-close is-large" aria-label="close"></button>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            // Functions to open and close a modal
            function openModal($el) {
                $el.classList.add('is-active');
            }

            function closeModal($el) {
                $el.classList.remove('is-active');
            }

            function closeAllModals() {
                (document.querySelectorAll('.modal') || []).forEach(($modal) => {
                    closeModal($modal);
                });
            }

            // Add a click event on buttons to open a specific modal
            (document.querySelectorAll('.js-modal-trigger') || []).forEach(($trigger) => {
                const modal = $trigger.dataset.target;
                const $target = document.getElementById(modal);

                $trigger.addEventListener('click', () => {
                    openModal($target);
                });
            });

            // Add a click event on various child elements to close the parent modal
            (document.querySelectorAll('.modal-background, .modal-close, .modal-card-head .delete, .modal-card-foot .button') || []).forEach(($close) => {
                const $target = $close.closest('.modal');

                $close.addEventListener('click', () => {
                    closeModal($target);
                });
            });

            // Add a keyboard event to close all modals
            document.addEventListener('keydown', (event) => {
                if (event.key === "Escape") {
                    closeAllModals();
                }
            });
        });
    </script>
</x-layout.main>
