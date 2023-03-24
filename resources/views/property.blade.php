<x-user-layout>
    <x-slot name="header">
{{--        <x-header page="page" :types="$types" :wheres="$wheres" :fors="$fors"></x-header>--}}
    </x-slot>
    <x-slot name="main">
        @isset($property)
            <section id="property">
                <article class="container">
                    <div id="p-carousel1" class="carousel slide card-img-top" data-bs-ride="true">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#p-carousel1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#p-carousel1" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#p-carousel1" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://picsum.photos/200/300?random=1" class="d-block w-100" alt="Property 1">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>First slide label</h5>
                                    <p>Some representative placeholder content for the first slide.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/200/300?random=2" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>First slide label</h5>
                                    <p>Some representative placeholder content for the first slide.</p>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/200/300?random=3" class="d-block w-100" alt="...">
                                <div class="carousel-caption d-none d-md-block">
                                    <h5>First slide label</h5>
                                    <p>Some representative placeholder content for the first slide.</p>
                                </div>
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#p-carousel1" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#p-carousel1" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div class="meta p-5">
                        <h2 class="post-title">{{ $property->title }}</h2>
                        <div class="flex">
                            <a href="#" class="price">{{ $property->price }}</a>
                            <a href="#" class="date">{{ $property->date_posted }}</a>
                            <a href="#" class="type">{{ "sdf" }}</a>
                            <a href="#" class="bednum">{{ $property->bedrooms_nb }}</a>
                            <a href="#" class="bathnum">{{ $property->bathrooms_nb }}</a>
                            <a href="#" class="space">{{ $property->size }}<sup>2</sup></a>
                        </div>
                    </div>
                    <p class="description">
                        {{ $property->description }}
                    </p>

                    <h3>Features</h3>
                    <ul class="grid custom-list">
                        <li class="list-item">A/c</li>
                        <li class="list-item">River View</li>
                        <li class="list-item">Something Cool</li>
                        <li class="list-item">Anoth Something Cool</li>
                    </ul>
                </article>
            </section>
        @endisset
    </x-slot>
</x-user-layout>
