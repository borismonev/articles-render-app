<x-layout.main>

    @if(session('success'))
        <div class="notification is-success">
            <button class="delete"></button>
            {{ session('success') }}
        </div>
    @endif

    <h1 class="title is-3">
        Tasks overview
        <a class="button has-background-primary" style="margin-left:5px; margin-bottom:10px" href="{{route('tasks.create')}}">Create Task</a>
    </h1>

    <h2 class="subtitle is-6 is-italic">
        Completing your tasks brings a sense of achievement, increases productivity,
        reduces stress, and helps you manage your time effectively. It creates a
        positive feedback loop, encourages you to prioritize important tasks, and
        provides opportunities to reward yourself. So, dive in, conquer your tasks,
        and enjoy the numerous benefits that come with it! You've got this!
    </h2>
    @foreach($tasks as $task)
        <x-task.list-item :task="$task"></x-task.list-item>
    @endforeach
</x-layout.main>
