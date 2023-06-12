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

    </x-slot>

</x-user-layout>
