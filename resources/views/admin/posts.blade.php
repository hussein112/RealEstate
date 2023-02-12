<x-admin-layout>
    <x-slot name="main">
        <main class="users-admin container">
            <h4 class="title my-2">Users</h4>

            <div class="remainders">
                <div class="alert alert-danger">
                    <a href="#"><strong>Property #34234</strong></a>, Should be Valuated by Mon, 21/10/2000
                </div>
            </div>
            <hr>
            <x-create-button target="a-newPost" title="Post"></x-create-button>

            <table class="table table-bordered caption-top">
                <caption>List of All Posts</caption>
                <thead class="bg-dark">
                <tr>
                    <th scope="col" class="text-primary">
                        <a href="#">ID</a>
                        <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                    </th>
                    <th scope="col" class="text-primary">
                        <a href="#">Title</a>
                        <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                    </th>
                    <th scope="col" class="text-primary">
                        <a href="#">Date Posted</a>
                        <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                    </th>
                    <th scope="col" class="text-primary">
                        <a href="#">Content</a>
                        <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                    </th>
                    <th scope="col" class="text-primary">
                        <a href="#">Category</a>
                        <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                    </th>
                    <th scope="col" class="text-primary">
                        <a href="#">Posted By</a>
                        <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                    </th>
                    <th>Details</th>
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
                            <td class="td-long">{{ $post->content }}</td>
                            <td>{{ $post->category->category }}</td>
                            <td>{{ ($post->author != null) ? $post->author->f_name . ' ' . $post->author->l_name : 'None' }}</td>
                            <td><a href="{{ route('post', ['id' => $post->id]) }}">></a></td>
                            <td class="action-btns">
                                <a href="{{ route('a-editPost', ['id' => $post->id]) }}" class="btn btn-primary m-1">Edit</a>
                                <a href="#" class="btn btn-danger m-1" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal">Delete</a>
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
            <div class="modal" tabindex="-1" id="deleteModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Delete User Ali Hammoud?</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p class="text-capitalize">Are You Sure You want to delete <strong>Ali Hammoud?</strong></p>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-success" data-bs-dismiss="modal">No</button>
                            <button type="button" class="btn btn-danger">Yes</button>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Delete Modal -->
        </main>
    </x-slot>
</x-admin-layout>
