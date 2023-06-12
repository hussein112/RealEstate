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
                                    <a href="{{ route('post', ['id' => $post->id]) }}" class="card-title">{{ $post->title }}</a>
                                </header>
                                <p class="card-text">{{ strip_tags($post->content) }}</p>
                                <div class="links d-flex justify-content-between align-items-center flex-wrap">
                                    <a href="{{ route('post', ['id' => $post->id]) }}" class="card-link btn btn-primary">
                                        Continue Reading
                                    </a>
                                    <a href="{{ route("searchByDate", ['date' => $post->created_at]) }}" class="date">
                                        @php($date = new \Illuminate\Support\Carbon($post->created_at))
                                        {{ $date->toDateString() }}
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
