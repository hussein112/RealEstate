<x-user-layout>
    <x-slot name="header">
        <x-header page="page" :types="$types" :wheres="$wheres" :fors="$fors"></x-header>
    </x-slot>
    <x-slot name="main">
        @isset($properties)
            <section id="all-properties">
                <h2 class="section-title center">{{ (Route::current()->getName() == "propertiesSearch") ? "Best Matches" : "All Properties" }}</h2>
                <div class="container cards d-flex flex-wrap align-items-center">
                    @foreach($properties as $property)
                        <div class="card m-2">
                            @isset($property->images)
                                @if(sizeof($property->images) > 1)
                                    <div id="l-p-carousel1" class="carousel slide card-img-top" data-bs-ride="true">
                                        <div class="carousel-inner">
                                            @foreach($property->images as $path)
                                                <div class="carousel-item {{ ($loop->first) ? "active" : "" }}">
                                                    <img src="{{ asset($path) }}" alt="{{ $property->title }}">
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
                                @elseif(sizeof($property->images) == 0)
                                    <img src="{{ asset('defaults/property.jpg') }}" class="d-block w-100" alt="{{ $property->title }}" loading="lazy">
                                @else
                                    <img src="{{ asset('storage/' . $property->images[0]->image) }}" class="d-block w-100" alt="{{ $property->title }}" loading="lazy">
                                @endif
                            @endisset


                            <div class="card-body">
                                <header class="card-head">
                                    <a href="{{ route("property", ['id' => $property->id]) }}" class="card-title">{{ $property->title }}</a>
                                    <div class="d-flex w-100 justify-content-between flex-wrap">
                                        <h6 class="card-subtitle">
                                            <a href="{{ route("searchByLocation", ['city' => $property->city]) }}" class="text-capitalize text-muted flex-center">
                                                <iconify-icon icon="material-symbols:location-on"></iconify-icon>
                                                <span>{{ ucfirst($property->city) }}</span>
                                            </a>
                                        </h6>
                                        <h6 class="card-subtitle">
                                            <a href="{{ route("searchByPrice", ['price' => $property->price]) }}" class="text-capitalize text-muted flex-center">
                                                <iconify-icon icon="ri:money-dollar-circle-fill"></iconify-icon>
                                                <span>{{ $property->price }}</span>
                                            </a>
                                        </h6>
                                        <h6 class="card-subtitle">
                                            <a href="{{ route("searchByBedroomsNumber", ['nb' => $property->bedrooms_nb]) }}" class="text-capitalize text-muted flex-center">
                                                <iconify-icon icon="ic:sharp-meeting-room"></iconify-icon>
                                                <span>{{ $property->bedrooms_nb }}</span>
                                            </a>
                                        </h6>
                                    </div>
                                </header>
                                <p class="card-text">{{ $property->description }}</p>
                                <div class="links d-flex w-100 justify-content-between flex-wrap">
                                    <a href="#" class="card-link ">
                                        <iconify-icon icon="material-symbols:heart-plus"></iconify-icon>
                                    </a>
                                    <a href="#" class="card-link">
                                        <iconify-icon icon="gis:search-poi"></iconify-icon>ss
                                    </a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </section>
        @endisset
        <div class="container flex-center paginator">
            {{ $properties->links() }}
        </div>
    </x-slot>

</x-user-layout>
