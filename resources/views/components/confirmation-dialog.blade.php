<div class="modal fade" id="msg" tabindex="-1" aria-modal="true" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5">{{ $title }}</h1>
                <button type="button" class="btn-close close" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p class="text-warning">{{ $body }}</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" id="confirm">Yes</button>
                <button type="button" class="btn btn-secondary close">No</button>
            </div>
        </div>
    </div>
</div>
<script>
    let modal = document.getElementById("msg");
    let form = document.getElementById("update-user-profile");
    document.getElementById("update-profile").addEventListener("click", (e) => {
        e.preventDefault();
        modal.classList.add('show');
        modal.style.display = 'block';
    });
    let close = document.querySelectorAll(".close");
    close.forEach(btn => {
        btn.addEventListener("click", () => {
            modal.classList.remove('show');
            modal.style.display = 'none';
        })
    })

    document.getElementById("confirm").addEventListener("click", () => {
        form.submit();
    });
</script>
