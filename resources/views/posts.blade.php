<x-user-layout>
    <x-slot name="header">
        <x-half-header></x-half-header>
    </x-slot>

    <x-slot name="main">
            <h2 class="section-title center">Blog</h2>
            <div class="container cards d-flex flex-wrap align-items-center">
                @isset($posts)
                    @foreach($posts as $post)
                        <div class="card m-2">
                            <img src="{{ asset("storage/defaults/post.jpg") }}" class="card-img-top" alt="Property 1">
                            <div class="card-body">
                                <header class="card-head">
                                    <a href="#" class="card-title">{{ $post->title }}</a>
                                </header>
                                <p class="card-text">{{ strip_tags($post->content) }}</p>
                                <div class="links d-flex justify-content-between align-items-center flex-wrap">
                                    <a href="#" class="card-link ">
                                        <iconify-icon icon="mdi:read-more"></iconify-icon>
                                    </a>
                                    <a href="#" class="date">
                                        {{ $post->created_at }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                @endisset

            </div>
        <div>
            {{ $posts->links() }}
        </div>
    </x-slot>
</x-user-layout>
