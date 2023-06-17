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

{{--                http://127.0.0.1:8000/storage/post/l4fAJy4JjdetuiqYLKxHedAu3lFl8CUc39PlHKdk.jpg--}}
                <input class="form-control my-2" type="text" name="title" placeholder="Title" value="{{ $post->title }}">
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
    setTimeout(function(){
        let images = Array.from(document.querySelectorAll("#editor img"));
        images.forEach(image => {
            console.log("IMAGE SORUCE: " + image.src);
            if(image.src.includes("storage")){
                image.src = "../" + image.src;
            }
        })
    }, 4000);
</script>
