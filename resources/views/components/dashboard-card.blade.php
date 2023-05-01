<div class="card">
    <div class="card-body">
        <iconify-icon class="card-icon" icon="{{$icon}}"></iconify-icon>
        <a href="{{ route($auth . "-" . $title) }}" class="card-title display-3">{{ ucfirst($title) }}</a>
        <p class="card-text display-2">{{ $count }}</p>
        @if($latestCount > 0)
            <div class="new flex-wrap flex-center">
                <span class="badge rounded-pill text-bg-info">+ {{ $latestCount }}</span> <p>Last Week</p>
            </div>
        @endif
    </div>
</div>
