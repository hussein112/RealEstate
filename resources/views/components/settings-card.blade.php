<div class="card">
    <div class="card-header">
        {{ucwords($header)}}
    </div>
    <div class="card-body">
        <p class="card-text">{{ucfirst($body)}}</p>
        <a href="{{ route($link) }}" class="btn btn-primary">Edit</a>
    </div>
</div>
