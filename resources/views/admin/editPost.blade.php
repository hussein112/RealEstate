<x-admin-layout>
    <x-slot name="main">
        <main class="admin-property container">
            <h4 class="title my-2 center">Edit Post #<strong>{{ $post->id }}</strong></h4>
            <div class="container my-5">
                <hr>
                @isset($post)
                    <form action="{{ route('a-editPost', ['id' => $post->id]) }}" method="post">
                        @method("PATCH")
                        @csrf
                        <input class="form-control my-2" type="text" placeholder="First Name" name="title" value="{{ $post->title }}">
                        <textarea name="content" class="form-control my-2" cols="30" rows="10">{{ $post->content }}</textarea>
                        <select name="category" class="form-select my-2">
                            @isset($categories)
                                <optione selected>-- Category --</optione>
                                @foreach($categories as $category)
                                    <option value="{{ $category->id }}">{{ $category->category }}</option>
                                @endforeach
                            @endisset
                        </select>

                        @isset($post->author)
                        <select name="author" class="form-select my-2">
                                <optione selected>-- Author --</optione>
                                @foreach($authors as $author)
                                    <option value="{{ $author->id }}">{{ $author->f_name . ' ' . $author->l_anme }}</option>
                                @endforeach
                        </select>
                        @endisset

                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>
                @endisset
            </div>
        </main>
    </x-slot>
</x-admin-layout>
