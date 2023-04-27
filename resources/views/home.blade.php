@php($recordPerGrid = 9)
<x-user-layout>
    <x-slot name="header">
        <x-header page="page" :types="$types" :wheres="$wheres" :fors="$fors"></x-header>
    </x-slot>
    <x-slot name="main">
        <!-- Featured Properties -->
        <section id="featured-properties">
            <h2 class="section-title center">Featured Properties</h2>
            <div class="container cards d-flex flex-wrap align-items-center">
                @isset($featured_properties)
                    <div id="f-p-carousel1" class="carousel slide card-img-top" data-bs-ride="true">
                        <div class="carousel-indicators">
                            @for($i = 0; $i < sizeof($featured_properties); $i++)
                                <button type="button" data-bs-target="#f-p-carousel1" data-bs-slide-to="{{$i}}" class="active" aria-current="true" aria-label="Slide {{$i}}"></button>
                            @endfor
                        </div>
                        <div class="carousel-inner">
                            @foreach($featured_properties as $fproperty)
                                <div class="carousel-item {{($loop->first) ? "active" : ""}}">
                                    @foreach($fproperty->images->image as $path)
                                    @if($loop->first)
                                        <img src="{{ asset("storage/" . $path) }}" class="d-block w-100" alt="Property 1" loading="lazy">
                                    @endif
                                   @endforeach
                                    <div class="carousel-caption d-none d-md-block">
                                        <h4><a href="{{ route('property', ['id' => $fproperty->id]) }}">{{ $fproperty->title }}</a></h4>
                                        <p>{{ $fproperty->description }}</p>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#f-p-carousel1" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#f-p-carousel1" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    @if(sizeof($featured_properties) > 10)
                        <div class="v-m center my-4">
                            <a href="{{ route('featuredProperties') }}" class="btn btn-primary view-more">View More</a>
                        </div>
                    @endif
                @endisset

            </div>
        </section>

        <!-- /Featured Properties -->


        <!-- Latest Properties -->
        <section id="latest-properties">
            <h2 class="section-title center">Latest Properties</h2>
            <div class="container cards d-flex flex-wrap align-items-center">
                    @foreach($latest_properties as $lproperty)
                        <div class="card m-2">
                            @if(sizeof($lproperty->images) > 0)
                                @if(sizeof($lproperty->images) > 1)
                                    <div id="l-p-carousel1" class="carousel slide card-img-top" data-bs-ride="true">
                                        <div class="carousel-inner">
                                            @foreach($lproperty->images as $image)
                                                <div class="carousel-item {{ ($loop->first) ? "active" : "" }}">
                                                    <img src="{{ asset("storage/" . $image->image) }}" class="d-block w-100" alt="Property" loading="lazy">
                                                </div>
                                            @endforeach
                                        </div>
                                        <button class="carousel-control-prev" type="button" data-bs-target="#l-p-carousel1" data-bs-slide="prev">
                                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Previous</span>
                                        </button>
                                        <button class="carousel-control-next" type="button" data-bs-target="#l-p-carousel1" data-bs-slide="next">
                                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                            <span class="visually-hidden">Next</span>
                                        </button>
                                    </div>
                                @else
                                    <img src="{{ asset("storage/" . $lproperty->images[0]->image) }}">
                                @endif
                            @endif

                            <div class="card-body">
                                <header class="card-head">
                                    <a href="{{ route('property', ['id' => $lproperty->id]) }}" class="card-title">{{ $lproperty->title }}</a>
                                    <div class="d-flex w-100 justify-content-between flex-wrap">
                                        <h6 class="card-subtitle">
                                            <a href="{{ route("searchByLocation", ['city' => $lproperty->city]) }}" class="text-capitalize text-muted flex-center">
                                                <iconify-icon icon="material-symbols:location-on"></iconify-icon>
                                                {{ ucfirst($lproperty->city) }}
                                            </a>

                                        </h6>
                                        <h6 class="card-subtitle">
                                            <a href="{{ route("searchByPrice", ['price' => $lproperty->price]) }}" class="text-capitalize text-muted flex-center">
                                                <iconify-icon icon="ri:money-dollar-circle-fill"></iconify-icon>
                                                {{ $lproperty->price }}
                                            </a>
                                        </h6>
                                        <h6 class="card-subtitle">
                                            <a href="{{ route("searchByBedroomsNumber", ['nb' => $lproperty->bedrooms_nb]) }}" class="text-capitalize text-muted flex-center">
                                                <iconify-icon icon="mdi:guest-room"></iconify-icon>
                                                {{ $lproperty->bedrooms_nb }}
                                            </a>
                                        </h6>
                                    </div>
                                </header>
                                <p class="card-text">{{ $lproperty->description }}</p>
                                <div class="links d-flex w-100 justify-content-between flex-wrap">
                                    <a href="#" class="card-link ">
                                        <iconify-icon icon="mdi:content-save-plus-outline"></iconify-icon>
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                    @if(sizeof($latest_properties) > 10)
                        <div class="v-m center">
                            <a href="{{ route("properties") }}" class="btn btn-primary view-more">View More</a>
                        </div>
                    @endif
            </div>
        </section>

        <!-- /Latest Properties -->



        <!-- Latest News -->

        <section id="latest-news">
            <h2 class="section-title center">Latest News</h2>
            <div class="container cards d-flex flex-wrap align-items-center">
                @isset($posts)
                    @foreach($posts as $post)
                        <div class="card m-2">
                            @isset($post->images->image)
                                @foreach($post->images->image as $path)
                                    <img src="{{ asset("storage/" . $path) }}" class="card-img-top" alt="Blog Post" loading="lazy">
                                @endforeach
                            @endisset
                            <div class="card-body">
                                <header class="card-head">
                                    <a href="{{ route('post', ['id' => $post->id]) }}" class="card-title">{{ $post->title }}</a>
                                </header>
                                <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam atque ab aperiam velit rem, nostrum necessitatibus deserunt esse, temporibus labore nulla.</p>
                                <div class="links d-flex justify-content-between align-items-center flex-wrap">
                                    <a href="{{ route('post', ['id' => $post->id]) }}" class="card-link ">
                                        <iconify-icon icon="mdi:read-more"></iconify-icon>
                                    </a>
                                    <a href="#" class="date">
                                        {{ $post->created_at }}
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach

                    @if(sizeof($posts) > 10)
                        <div class="v-m center">
                            <a href="{{ route("blog") }}" class="btn btn-primary view-more">View More</a>
                        </div>
                    @endif
                @endisset


            </div>
        </section>

        <!-- /Latest News -->

    </x-slot>

</x-user-layout>
