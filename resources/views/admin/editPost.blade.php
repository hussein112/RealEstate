<x-admin-layout>
    <x-slot name="main">
        <script src="https://cdn.tiny.cloud/1/kpum9hwkqbfk4jh8byr2k70m6lgh669bbqxig4cblr9e8gc5/tinymce/6/tinymce.min.js" referrerpolicy="origin"></script>
        <div class="container">
            <x-page-title title="profile" subtitle="edit post {{ $post->title }}"></x-page-title>
            <x-messages msg="error_msg" type="danger"></x-messages>
            <x-messages msg="success_msg" type="success"></x-messages>
            <hr>
            <form action="{{ route("a-editPost", ['id' => $post->id]) }}" method="post" class="new-post" enctype="multipart/form-data">
                @method("PATCH")
                @csrf
                <input class="form-control my-2" type="text" name="title" maxlength="70" placeholder="Title" value="{{ $post->title }}">
                <textarea id="editor" name="post" class="my-2">{{ $post->content }}</textarea>
                <select name="category" class="form-select my-2">
                    @isset($categories)
                        <option disabled>--- Category ---</option>
                        @foreach($categories as $category)
                            <option value="{{ $category->id }}" @selected($category->id == $post->category_id)>{{ $category->category }}</option>
                        @endforeach
                    @endisset
                </select>
                <button class="btn btn-primary my-2" type="submit">Update</button>
            </form>
        </div>
        @vite('resources/js/editorScaffolding.js')
    </x-slot>
</x-admin-layout>
<script>
    // Quick & Urgent fix for TinyMCE path
    setTimeout(() => {
        let editor = document.querySelector('iframe');
        let iframeDocument = editor.contentDocument || editor.contentWindow.document;
        let images = Array.from(iframeDocument.querySelectorAll("img"));
        images.forEach(image => {
            console.log("IMAGE SORUCE: " + image.src);
            if(image.src.includes("storage")){
                image.src = image.src.replace("admin/", '');
            }
        })
    }, 5000);
</script>
