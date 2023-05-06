<x-admin-layout>
    <x-slot name="main">
        <main class="container">
            <x-page-title title="terms" subtitle="describe what your company terms & conditions"></x-page-title>
            <x-messages msg="error_msg" type="danger"></x-messages>
            <x-messages msg="success_msg" type="success"></x-messages>
            <hr>
            <script src="https://cdn.tiny.cloud/1/kpum9hwkqbfk4jh8byr2k70m6lgh669bbqxig4cblr9e8gc5/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
            <form action="{{ route("edit-terms") }}" method="post" class="new-post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <input type="text" name="quote" class="form-control my-2" placeholder="Quote" value="{!! \Illuminate\Support\Facades\Storage::get('website/terms/quote.txt') !!}">
                <textarea id="editor" name="content" class="my-2">
                    {!! \Illuminate\Support\Facades\Storage::get('website/terms/terms.txt') !!}
                </textarea>
                <button class="btn btn-primary my-2" type="submit">Update</button>
            </form>
            @vite('resources/js/editorScaffolding.js')
        </main>
    </x-slot>
</x-admin-layout>
