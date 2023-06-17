@php
    $color = '';
    switch($type){
        case($type == 'info'):
            $color = 'info';
            break;
        case($type == 'success'):
            $color = 'success';
            break;
        case($type == 'danger'):
            $color = 'danger';
            break;
        case($type == 'warning'):
            $color = 'warning';
            break;
    }
@endphp
<div class="modal fade show" id="msg" tabindex="-1" aria-modal="true" role="dialog" style="display: block;">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">{{ ($title) ?? config('company.name') }}</h1>
                <button type="button" class="btn-close close" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-{{ $color }}">{{ $msg }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary close">Ok</button>
            </div>
        </div>
    </div>
</div>
<script>
    let close = document.querySelectorAll(".close");
    console.log(close);
    close.forEach(btn => {
        btn.addEventListener("click", () => {
            let modal = document.getElementById("msg");
            modal.classList.remove('show');
            modal.style.display = 'none';
        })
    })
</script>
