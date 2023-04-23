<x-admin-layout>
    <x-slot name="main">
        <main class="users-admin container">
            <x-page-title title="posts"></x-page-title>

            <hr>
            <x-create-button target="a-newPost" title="Post"></x-create-button>

            <table class="table table-bordered caption-top">
                <caption>List of All Posts</caption>
                <thead class="bg-dark">
                <tr>
                    <th scope="col" class="text-primary">
                        @sortablelink('id', "ID")
                    </th>
                    <th scope="col" class="text-primary">
                        @sortablelink('title', "Title")
                    </th>
                    <th scope="col" class="text-primary">
                        @sortablelink('date_posted', "Date Posted")
                    </th>
                    <th scope="col" class="text-primary">
                        @sortablelink('content', "Content")
                    </th>
                    <th scope="col" class="text-primary">
                        @sortablelink('category_id', "Category")
                    </th>
                    <th scope="col" class="text-primary">
                        @sortablelink('admin_id', "Author")
                    </th>
                    <th>View</th>
                    <th scope="col" class="text-primary">Actions</th>
                </tr>
                </thead>
                <tbody>
                @isset($posts)
                    @foreach($posts as $post)
                        <tr>
                            <th scope="row">{{ $post->id }}</th>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->date_posted }}</td>
                            <td class="td-long">{{ strip_tags($post->content) }}</td>
                            <td>{{ ($post->category->category) ?? "Uncategorized" }}</td>
                            <td>{{ $post->author->f_name . ' ' . $post->author->l_name }}</td>
                            <td><a href="{{ route('post', ['id' => $post->id]) }}">></a></td>
                            <td class="action-btns">
                                <a href="{{ route('a-editPost', ['id' => $post->id]) }}" class="btn btn-primary m-1">Edit</a>
                                <button class="btn btn-danger m-1" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $post->id }}">Delete</button>
                            </td>
                        </tr>
                    @endforeach

                @endisset
                </tbody>
            </table>

            <div class="center">
                {{ $posts->links() }}
            </div>

            <!-- Start Delete Modal -->
                @foreach($posts as $post)
                    <x-delete-modal target="post" targetId="{{ $post->id }}" auth="a">
                    </x-delete-modal>
                @endforeach
            <!-- End Delete Modal -->
        </main>
    </x-slot>
</x-admin-layout>
