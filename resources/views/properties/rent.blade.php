<x-user-layout>
    <x-slot name="header">
        <x-header page="rent" :types="$types" :wheres="$wheres" :fors="$fors"></x-header>
    </x-slot>
    <x-slot name="main">
        @isset($properties)
            <section id="properties-for-rent">
                <h2 class="section-title center">All Properties For Rent</h2>
                <div class="container cards d-flex flex-wrap align-items-center">
                    @foreach($properties as $property)
                        <div class="card m-2">
                            @if(sizeof($property->images) > 1)
                                <div id="l-p-carousel1" class="carousel slide card-img-top" data-bs-ride="true">
                                    <div class="carousel-inner">
                                        @foreach($property->images as $image)
                                            <div class="carousel-item active">
                                                <img src="{{ asset('storage/' . $image) }}" class="d-block w-100" alt="Property 1" loading="lazy">
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
                                <img src="{{ asset('storage/' . $property->images[0]->image) }}" alt="">
                            @endif
                            <div class="card-body">
                                <header class="card-head">
                                    <a href="#" class="card-title">{{ $property->title }}</a>
                                    <div class="d-flex w-100 justify-content-between flex-wrap">
                                        <h6 class="card-subtitle">
                                            <a href="#" class="text-capitalize text-muted flex-center">
                                                <iconify-icon icon="material-symbols:location-on"></iconify-icon>
                                                {{ $property->location }}
                                            </a>
                                        </h6>
                                        <h6 class="card-subtitle">
                                            <a href="#" class="text-capitalize text-muted flex-center">
                                                <iconify-icon icon="ri:money-dollar-circle-fill"></iconify-icon>
                                                {{ $property->price }}
                                            </a>
                                        </h6>
                                        <h6 class="card-subtitle">
                                            <a href="#" class="text-capitalize text-muted flex-center">
                                                <iconify-icon icon="ic:sharp-meeting-room"></iconify-icon>
                                                {{ $property->bedrooms_nb }}
                                            </a>
                                        </h6>
                                    </div>
                                </header>
                                <p class="card-text">{{ $property->description }}</p>
                                <div class="links d-flex w-100 justify-content-between flex-wrap">
                                    <a href="#" class="card-link ">
                                        <iconify-icon icon="mdi:content-save-plus-outline"></iconify-icon>
                                    </a>
                                    <a href="#" class="card-link">
                                        <iconify-icon icon="gis:search-poi"></iconify-icon>
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
