<div class="container">
    @if(session('success_msg') != null)
        <strong class="bg-success p-5 text-light">{{ session("success_msg") }}</strong>
    @elseif(session("error_msg" != null))
        <strong class="bg-danger p-5 text-dark">{{ session("error_msg") }}</strong>
    @endif
</div>
