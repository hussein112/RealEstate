<div class="modal" tabindex="-1" id="editModal{{$targetId}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit {{ $target }} #{{ $targetId }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <input type="text" value="{{ $target }}">
            </div>
{{--            <form method="post" action="{{ route($auth . '-delete' . ucfirst($target), ['id' => $targetId]) }}" class="modal-footer">--}}
{{--                @method('DELETE')--}}
{{--                @csrf--}}
{{--                <button type="button" class="btn btn-success" data-bs-dismiss="modal">No</button>--}}
{{--                <button type="submit" class="btn btn-danger">Yes</button>--}}
{{--            </form>--}}
        </div>
    </div>
</div>
