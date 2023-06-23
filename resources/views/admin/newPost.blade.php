<x-admin-layout>
    <x-slot name="main">
        <main class="container">
            <script src="https://cdn.tiny.cloud/1/kpum9hwkqbfk4jh8byr2k70m6lgh669bbqxig4cblr9e8gc5/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
            <x-page-title title="post" subtitle="publish new post"></x-page-title>
            <x-messages msg="error_msg" type="danger"></x-messages>
            <x-messages msg="success_msg" type="success"></x-messages>
            <hr>
            <form action="{{ route("a-newPost") }}" method="post" class="new-post" enctype="multipart/form-data">
                @csrf
                <input class="form-control my-2" type="text" name="title" placeholder="Title" maxlength="90" required>
                <textarea id="editor" name="post" class="my-2" required></textarea>
                <select name="category" class="form-select my-2">
                    @isset($categories)
                        <option selected disabled>--- Category ---</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}">{{ $category->category }}</option>
                        @endforeach
                    @endisset
                </select>
                <button class="btn btn-primary my-2" type="submit">Post</button>
            </form>
            @vite('resources/js/editorScaffolding.js')
        </main>
    </x-slot>
</x-admin-layout>
