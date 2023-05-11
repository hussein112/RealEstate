<x-admin-layout>
    <x-slot name="main">
        <main class="container">
            <x-page-title title="email" subtitle="edit how your customers receive your emails"></x-page-title>
            <x-messages msg="error_msg" type="danger"></x-messages>
            <x-messages msg="success_msg" type="success"></x-messages>
            <hr>
            @isset($email)
                @php($directory = (substr($email, 0, 1) == "a") ? "advertise" : "valuation")
                @php($type = (substr($email, 2, 1) == "a" ? "approved" : "rejected"))
            @endisset
            <script src="https://cdn.tiny.cloud/1/kpum9hwkqbfk4jh8byr2k70m6lgh669bbqxig4cblr9e8gc5/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
            <form action="{{ route("edit-email", ['email' => $email]) }}" method="post" class="new-post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <input type="text" name="title" class="form-control my-2" placeholder="Title" value="{!! \Illuminate\Support\Facades\Storage::get('website/email/' . $directory . '/' . $type . '/title.txt') !!}">
                <textarea id="editor" name="body" class="my-2">
                    {!! \Illuminate\Support\Facades\Storage::get('website/email/' . $directory . '/' . $type . '/body.txt') !!}
                </textarea>
                <button class="btn btn-primary my-2" type="submit">Update</button>
            </form>
            @vite('resources/js/editorScaffolding.js')
        </main>
    </x-slot>
</x-admin-layout>
