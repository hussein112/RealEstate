@if(session($msg) != null)
    <div class="alert alert-{{$type}} my-2"> {{ session($msg) }} </div>
@endif
