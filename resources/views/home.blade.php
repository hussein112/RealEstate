@php($recordPerGrid = 9)
<x-user-layout>
    <x-slot name="header">
        <x-header page="page" :types="$types" :wheres="$wheres" :fors="$fors"></x-header>
    </x-slot>
    <x-slot name="main">
        @if(session('info_message') != null)
            <x-alert-message type="info" msg="{{ session('info_message') }}"></x-alert-message>
        @endif
        @if(session('success_msg') != null)
            <x-alert-message type="success" msg="{{ session('success_msg') }}"></x-alert-message>
        @endif
        <!-- Featured Properties -->
        <section id="featured-properties">
            <h2 class="section-title center">Featured Properties</h2>
            <div class="container cards d-flex flex-wrap align-items-center">
                @isset($featured_properties)
                    @if(sizeof($featured_properties) > 1)
                        <div id="f-p-carouel1" class="carousel slide card-img-top" data-bs-ride="true">
                            <div class="carousel-indicators">
                                @for($i = 0; $i < sizeof($featured_properties); $i++)
                                    <button type="button" data-bs-target="#f-p-carousel1" data-bs-slide-to="{{$i}}" class="active" aria-current="true" aria-label="Slide {{$i}}"></button>
                                @endfor
                            </div>
                            <div class="carousel-inner">
                                @foreach($featured_properties as $fproperty)
                                    <div class="carousel-item {{($loop->first) ? "active" : ""}}">
                                        @isset($fproperty->images)
                                            @foreach($fproperty->images as $image)
                                                @if($loop->first)
                                                    <img src="{{ asset("storage/" . $image->image) }}" class="d-block w-100" alt="Property 1" loading="lazy">
                                                @endif
                                            @endforeach
                                        @endisset
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
                    @else
                        <div>
                            <div class="carousel-inner">
                                @foreach($featured_properties as $fproperty)
                                    <div class="carousel-item {{($loop->first) ? "active" : ""}}">
                                        @isset($fproperty->images)
                                            @foreach($fproperty->images as $image)
                                                @if($loop->first)
                                                    <img src="{{ asset("storage/" . $image->image) }}" class="d-block w-100" alt="Property 1" loading="lazy">
                                                @endif
                                            @endforeach
                                        @endisset
                                        <div class="carousel-caption d-none d-md-block">
                                            <h4><a href="{{ route('property', ['id' => $fproperty->id]) }}" class="text-primary">{{ $fproperty->title }}</a></h4>
                                            <p>{{ $fproperty->description }}</p>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    @endif

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

        @if(sizeof($latest_properties) > 0)
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
                                                    <img src="{{ asset('storage/' . $image->image) }}" class="d-block w-100" alt="Property" loading="lazy">
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
                                                <span>{{ ucfirst($lproperty->city) }}</span>
                                            </a>

                                        </h6>
                                        <h6 class="card-subtitle">
                                            <a href="{{ route("searchByPrice", ['price' => $lproperty->price]) }}" class="text-capitalize text-muted flex-center">
                                                <iconify-icon icon="ri:money-dollar-circle-fill"></iconify-icon>
                                                <span>{{ $lproperty->price }}</span>
                                            </a>
                                        </h6>
                                        <h6 class="card-subtitle">
                                            <a href="{{ route("searchByBedroomsNumber", ['nb' => $lproperty->bedrooms_nb]) }}" class="text-capitalize text-muted flex-center">
                                                <iconify-icon icon="mdi:guest-room"></iconify-icon>
                                                <span>{{ $lproperty->bedrooms_nb }}</span>
                                            </a>
                                        </h6>
                                    </div>
                                </header>
                                <p class="card-text">{{ $lproperty->description }}</p>
                                <div class="links d-flex w-100 justify-content-between flex-wrap">
                                    <form class="card-link" action="{{ route("addToFavourites", ['id' => $lproperty->id]) }}" method="post">
                                        @csrf
                                        <button @auth type="submit" @endauth @guest type="button" data-bs-toggle="modal" data-bs-target="#loginModal" @endguest>
                                            <iconify-icon icon="material-symbols:heart-plus"></iconify-icon>
                                        </button>
                                    </form>
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
        @endif

        <!-- /Latest Properties -->


        <!-- Latest News -->

        @if(sizeof($posts) > 0)
            <section id="latest-news">
                <h2 class="section-title center">Latest News</h2>
                <div class="container cards d-flex flex-wrap align-items-center">
                    @isset($posts)
                        @foreach($posts as $post)
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

                        @if(sizeof($posts) > 10)
                            <div class="v-m center">
                                <a href="{{ route("blog") }}" class="btn btn-primary view-more">View More</a>
                            </div>
                        @endif
                    @endisset


                </div>
            </section>
        @endif

        <!-- /Latest News -->


        <x-login-modal></x-login-modal>
    </x-slot>

</x-user-layout>
