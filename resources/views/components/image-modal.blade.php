<div class="modal fade" tabindex="-1" id="imageModal{{$targetId}}">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">{{ $modalTitle }}</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <img class="mw-100 mh-50" src="{{ asset("storage/" . $img) }}">
            </div>
        </div>
    </div>
</div>
