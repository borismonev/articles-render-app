<x-layout.main>
    <div class="columns">
        <div class="column">
            <a class="button has-background-primary mr-2" style="width:6%"
               href="{{route('tasks.edit', ['task' => $task])}}">Edit</a>
            <button class="js-modal-trigger has-background-danger button" data-target="modal-js"
            >Delete
            </button>
        </div>
    </div>

    <h1 class="title is-4">
        {{ $task['title'] }}
        @if($task->project)
            <p>Belongs to project: {{ $task->project->title }}</p>
        @endif
    </h1>
    <div class="tags">
        <span class="tag has-text-weight-bold">
            {{ $task['state'] }}
        </span>
        <x-task.priority-tag :$task></x-task.priority-tag>
    </div>
    <div class="tags has-addons">
        <span class="tag">Time</span>
        <span class="tag has-text-weight-bold
                {{ $task['time_spent'] > $task['time_estimated'] ? 'has-text-danger' : '' }}">
                {{ $task['time_spent'] }}/{{ $task['time_estimated'] }}
            </span>
    </div>
    <x-ui.date-tag title="Created">{{ $task['created_at'] }}</x-ui.date-tag>
    <x-ui.date-tag title="Updated">{{ $task['updated_at'] }}</x-ui.date-tag>
    @if($task['completed_at'])
        <x-ui.date-tag title="Completed">{{ $task['completed_at'] }}</x-ui.date-tag>
    @endif
    <h2 class="subtitle is-6">
        {!! $task['description'] !!}
    </h2>

    {{$task->state}}
    {{$task->completed_at}}
    {{$task->swag}}
    {{$task->yo}}

    <div class="modal" id="modal-js">
        <div class="modal-background"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Are you sure you want to delete this task?</p>
                <button class="delete" aria-label="close"></button>
            </header>
            <section class="modal-card-body is-clipped">
                <p class="image is-4by3">
                    <img
                        src="{{asset("images/shocked-black-guy.gif")}}" alt="">
                </p>
            </section>
            <footer class="modal-card-foot">
                <form action="{{route('tasks.destroy', ['task' => $task])}}" method="POST">
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
