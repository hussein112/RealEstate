<x-user-layout>

    <x-slot name="header">
        <x-half-header></x-half-header>
    </x-slot>

    <x-slot name="main">
        @isset($post)
            <section id="post">
                @if(sizeof($post->images) > 0)
                    <img src="{{ asset('storage/' . $post->images[0]->image) }}" alt="">
                @endif
                <div class="meta p-5">
                    <h2 class="post-title">{{ $post->title }}</h2>
                    <div class="flex flex-wrap">
                        <a href="{{ route("searchByAuthor", ['id' => $post->author->id]) }}" class="author flex-center">
                            <iconify-icon icon="uil:pen" class="mx-2"></iconify-icon>
                            {{ $post->author->f_name . ' ' . $post->author->l_name }}
                        </a>
                        <a href="{{ route("searchByDate", ['date' => $post->created_at]) }}" class="date">
                            @php($date = new \Illuminate\Support\Carbon($post->created_at))
                            {{ $date->toDateString() }}
                        </a>
                            @if(isset($post->category->category))
                            <a href="{{ route("searchByCategory", ['id' => $post->category->id]) }}" class="category flex-center">
                                <iconify-icon icon="mdi:tags" class="mx-2"></iconify-icon>
                                {{ $post->category->category }}
                            </a>
                            @else
                                <div>
                                    <iconify-icon icon="mdi:tags" class="mx-2"></iconify-icon>
                                    Uncategorized
                                </div>
                            @endif
                    </div>
                </div>
                <article class="container">
                    {!! $post->content !!}
                </article>
            </section>
        @endisset


        <!-- Start Similar Posts -->

        @isset($similar_posts)
            <h2 class="section-title center">Similar Posts</h2>
            <div class="container cards d-flex flex-wrap align-items-center">
                @foreach($similar_posts as $post)
                    <div class="card m-2">
                        @if(sizeof($post->images) > 0)
                            {{--                                    Set the first image as thumbnail --}}
                            <img src="{{ asset("storage/" . $post->images[0]->image) }}" class="card-img-top" alt="Blog Post" loading="lazy">
                        @endif
                        <div class="card-body">
                            <header class="card-head">
                                <a href="{{ route('post', ['id' => $post->id]) }}" class="card-title">{{ $post->title }}</a>
                            </header>
                            <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam atque ab aperiam velit rem, nostrum necessitatibus deserunt esse, temporibus labore nulla.</p>
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
            </div>
        @endisset

        <!-- End Similar Posts -->

    </x-slot>

</x-user-layout>
