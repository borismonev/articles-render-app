<article class="media">
    <div class="media-content">
        <div class="content">
            <a href="{{ route('projects.show', $project['id']) }}">
                Project {{ $project['id'] }}
            </a>
            <br>
            <div>
        <span>
            Title - {!! $project['title'] !!}
        </span>
            </div>
            <div>
        <span>
            Created at: {!! $project['created_at'] !!}
        </span>
            </div>
            <div>
        <span>
            Tasks in project: {{count($project->tasks)}}
        </span>
            </div>

            <div>
        <span>
            Tasks Completed: {{$project->tasksCompleted}}
        </span>
            </div>

        </div>
    </div>
    <div class="media-right">
    </div>
</article>
