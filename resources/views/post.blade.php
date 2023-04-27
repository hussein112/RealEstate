<x-user-layout>

    <x-slot name="header">
        <x-half-header></x-half-header>
    </x-slot>

    <x-slot name="main">

        @isset($post)
            <section id="post">
                <div class="meta p-5">
                    <h2 class="post-title">{{ $post->title }}</h2>
                    <div class="flex flex-wrap">
                        <a href="author_posts.html" class="author flex-center">
                            <iconify-icon icon="uil:pen" class="mx-2"></iconify-icon>
                            {{ $post->author->f_name . ' ' . $post->author->l_name }}
                        </a>
                        <a href="date_posts.html" class="date flex-center">
                            <iconify-icon icon="material-symbols:edit-calendar" class="mx-2"></iconify-icon>
                            {{ $post->created_at }}
                        </a>
                        <a href="category_post.html" class="category flex-center">
                            <iconify-icon icon="mdi:tags" class="mx-2"></iconify-icon>
                            {{ ($post->category->category) ?? "Uncategorized" }}
                        </a>
                    </div>
                </div>
                <article class="container">
                    {!! $post->content !!}
                </article>
            </section>
        @endisset

    </x-slot>

</x-user-layout>
