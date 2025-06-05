<x-layout.main>
    <h1 class="is-size-3">Projects
        <a href="{{route('projects.create')}}" class="button is-primary" style="margin-top:8px; margin-left:10px">Create
            Project</a>
    </h1>
    <br>
    @foreach($projects as $project)
        <x-layout.itemProject :project="$project"></x-layout.itemProject>
    @endforeach
</x-layout.main>
