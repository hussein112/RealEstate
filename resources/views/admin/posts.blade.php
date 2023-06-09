<x-admin-layout>
    <x-slot name="main">
        <main class="users-admin container">
            <x-page-title title="posts" subtitle="all the posts in the system"></x-page-title>
            <hr>
            <x-create-button target="a-newPost" title="Post"></x-create-button>
            <div class="d-flex">
                <table class="table table-bordered caption-top">
                <caption>List of All Posts</caption>
                <thead>
                <tr>
                    <th scope="col">
                        @sortablelink('id', "ID")
                    </th>
                    <th scope="col">
                        @sortablelink('title', "Title")
                    </th>
                    <th scope="col">
                        @sortablelink('date_posted', "Date Posted")
                    </th>
                    <th scope="col">
                        @sortablelink('content', "Content")
                    </th>
                    <th scope="col">
                        @sortablelink('category_id', "Category")
                    </th>
                    <th scope="col">
                        @sortablelink('admin_id', "Author")
                    </th>
                    <th scope="col">View</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                <tbody>
                @isset($posts)
                    @foreach($posts as $post)
                        <tr>
                            <th scope="row">{{ $post->id }}</th>
                            <td>{{ $post->title }}</td>
                            <td>{{ $post->created_at }}</td>
                            <td class="td-long">{{ strip_tags($post->content) }}</td>
                            <td>{{ ($post->category->category) ?? "Uncategorized" }}</td>
                            <td>{{ $post->author->f_name . ' ' . $post->author->l_name }}</td>
                            <td><a href="{{ route('post', ['id' => $post->id]) }}" class="flex-center btn btn-primary"><iconify-icon icon="ic:sharp-remove-red-eye"></iconify-icon></a></td>
                            <td class="action-btns">
                                <a href="{{ route('a-editPost', ['id' => $post->id]) }}" class="btn btn-primary m-1">Edit</a>
                                <button class="btn btn-danger m-1" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal{{ $post->id }}">Delete</button>
                            </td>
                        </tr>
                    @endforeach

                @endisset
                </tbody>
            </table>
                <div>
                    @foreach($categories as $category)
                        <div>
                            <span>{{ $category->category }}</span>

                            <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#editModal{{ $category->id }}">
                                <iconify-icon icon="material-symbols:edit"></iconify-icon>
                            </button>
                        </div>
                    @endforeach
                </div>
            </div>

            <div class="center">
                {{ $posts->links() }}
            </div>

            <!-- Start Delete Post Modal -->
            @foreach($posts as $post)
                <x-delete-modal target="post" targetId="{{ $post->id }}" auth="a">
                </x-delete-modal>
            @endforeach
            <!-- End Delete Post Modal -->

            <!-- Start Edit Category Modal -->
            @foreach($categories as $category)
                <x-edit-modal target="Category" targetId="{{ $category->id }}" targetContent="{{ $category->category }}" auth="a"></x-edit-modal>
            @endforeach
            <!-- End Edit Category Modal -->

        </main>
    </x-slot>
</x-admin-layout>
