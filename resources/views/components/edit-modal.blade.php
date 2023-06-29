<div class="modal" tabindex="-1" id="editModal{{$targetId}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit {{ $target }} #{{ $targetId }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form method="post" action="{{ route($auth . '-update' . ucfirst($target), ['id' => $targetId]) }}">
                    @method('PATCH')
                    @csrf
                    <input name="category" type="text" class="form-control" value="{{ $targetContent }}">
                    <button type="submit" class="btn btn-danger">Update</button>
                </form>
            </div>

        </div>
    </div>
</div>
