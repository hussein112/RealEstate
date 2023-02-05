<x-user-layout>
    <x-slot name="header">
        <x-header page="page"></x-header>
    </x-slot>
    <x-slot name="main">
        <!-- Featured Properties -->

        <section id="featured-properties">
            <h2 class="section-title center">Featured Properties</h2>
            <div class="container cards d-flex flex-wrap align-items-center">
                <div id="f-p-carousel1" class="carousel slide card-img-top" data-bs-ride="true">
                    <div class="carousel-indicators">
                        <button type="button" data-bs-target="#f-p-carousel1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                        <button type="button" data-bs-target="#f-p-carousel1" data-bs-slide-to="1" aria-label="Slide 2"></button>
                        <button type="button" data-bs-target="#f-p-carousel1" data-bs-slide-to="2" aria-label="Slide 3"></button>
                    </div>
                    <div class="carousel-inner">
                        <div class="carousel-item active">
                            <img src="https://picsum.photos/200/300?random=1" class="d-block w-100" alt="Property 1" loading="lazy">
                            <div class="carousel-caption d-none d-md-block">
                                <h4><a href="#">Property 1</a></h4>
                                <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/200/300?random=2" class="d-block w-100" alt="..." loading="lazy">
                            <div class="carousel-caption d-none d-md-block">
                                <h4><a href="#">Property 2</a></h4>
                                <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
                        <div class="carousel-item">
                            <img src="https://picsum.photos/200/300?random=3" class="d-block w-100" alt="..." loading="lazy">
                            <div class="carousel-caption d-none d-md-block">
                                <h4><a href="#">Property 3</a></h4>
                                <p>Some representative placeholder content for the first slide.</p>
                            </div>
                        </div>
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
                <div class="v-m center my-4">
                    <a href="#" class="btn btn-primary view-more">View More</a>
                </div>
            </div>
        </section>

        <!-- /Featured Properties -->



        <!-- Latest Properties -->

        <section id="latest-properties">
            <h2 class="section-title center">Latest Properties</h2>
            <div class="container cards d-flex flex-wrap align-items-center">
                <div class="card m-2">
                    <div id="l-p-carousel1" class="carousel slide card-img-top" data-bs-ride="true">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://picsum.photos/seed/picsum/300/300?random=1" class="d-block w-100" alt="Property 1" loading="lazy">
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/seed/picsum/300/300?random=2" class="d-block w-100" alt="..." loading="lazy">
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/seed/picsum/300/300?random=3" class="d-block w-100" alt="..." loading="lazy">
                            </div>
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
                    <div class="card-body">
                        <header class="card-head">
                            <a href="#" class="card-title">Property 1</a>
                            <div class="d-flex w-100 justify-content-between flex-wrap">
                                <h6 class="card-subtitle">
                                    <a href="#" class="text-capitalize text-muted flex-center">
                                        <iconify-icon icon="material-symbols:location-on"></iconify-icon>
                                        Beirut
                                    </a>
                                </h6>
                                <h6 class="card-subtitle">
                                    <a href="#" class="text-capitalize text-muted flex-center">
                                        <iconify-icon icon="ri:money-dollar-circle-fill"></iconify-icon>
                                        1500
                                    </a>
                                </h6>
                                <h6 class="card-subtitle">
                                    <a href="#" class="text-capitalize text-muted flex-center">
                                        <iconify-icon icon="ic:sharp-meeting-room"></iconify-icon>
                                        5
                                    </a>
                                </h6>
                            </div>
                        </header>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam atque ab aperiam velit rem, nostrum necessitatibus deserunt esse, temporibus labore nulla.</p>
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

                <div class="card m-2">
                    <div id="l-p-carousel2" class="carousel slide card-img-top" data-bs-ride="true">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://picsum.photos/seed/picsum/300/300?random=1" class="d-block w-100" alt="Property 1" loading="lazy">
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/seed/picsum/300/300?random=2" class="d-block w-100" alt="..." loading="lazy">
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/seed/picsum/300/300?random=3" class="d-block w-100" alt="..." loading="lazy">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#l-p-carousel2" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#l-p-carousel2" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <header class="card-head">
                            <a href="#" class="card-title">Property 1</a>
                            <div class="d-flex w-100 justify-content-between flex-wrap">
                                <h6 class="card-subtitle">
                                    <a href="#" class="text-capitalize text-muted flex-center">
                                        <iconify-icon icon="material-symbols:location-on"></iconify-icon>
                                        Beirut
                                    </a>
                                </h6>
                                <h6 class="card-subtitle">
                                    <a href="#" class="text-capitalize text-muted flex-center">
                                        <iconify-icon icon="ri:money-dollar-circle-fill"></iconify-icon>
                                        1500
                                    </a>
                                </h6>
                                <h6 class="card-subtitle">
                                    <a href="#" class="text-capitalize text-muted flex-center">
                                        <iconify-icon icon="ic:sharp-meeting-room"></iconify-icon>
                                        5
                                    </a>
                                </h6>
                            </div>
                        </header>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam atque ab aperiam velit rem, nostrum necessitatibus deserunt esse, temporibus labore nulla.</p>
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

                <div class="card m-2">
                    <div id="l-p-carousel3" class="carousel slide card-img-top" data-bs-ride="true">
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://picsum.photos/seed/picsum/300/300?random=1" class="d-block w-100" alt="Property 1" loading="lazy">
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/seed/picsum/300/300?random=2" class="d-block w-100" alt="..." loading="lazy">
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/seed/picsum/300/300?random=3" class="d-block w-100" alt="..." loading="lazy">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#l-p-carousel3" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#l-p-carousel3" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>
                    </div>
                    <div class="card-body">
                        <header class="card-head">
                            <a href="#" class="card-title">Property 1</a>
                            <div class="d-flex w-100 justify-content-between flex-wrap">
                                <h6 class="card-subtitle">
                                    <a href="#" class="text-capitalize text-muted flex-center">
                                        <iconify-icon icon="material-symbols:location-on"></iconify-icon>
                                        Beirut
                                    </a>
                                </h6>
                                <h6 class="card-subtitle">
                                    <a href="#" class="text-capitalize text-muted flex-center">
                                        <iconify-icon icon="ri:money-dollar-circle-fill"></iconify-icon>
                                        1500
                                    </a>
                                </h6>
                                <h6 class="card-subtitle">
                                    <a href="#" class="text-capitalize text-muted flex-center">
                                        <iconify-icon icon="ic:sharp-meeting-room"></iconify-icon>
                                        5
                                    </a>
                                </h6>
                            </div>
                        </header>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam atque ab aperiam velit rem, nostrum necessitatibus deserunt esse, temporibus labore nulla.</p>
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

                <div class="v-m center">
                    <a href="{{ route("properties") }}" class="btn btn-primary view-more">View More</a>
                </div>
            </div>
        </section>

        <!-- /Latest Properties -->



        <!-- Latest News -->

        <section id="latest-news">
            <h2 class="section-title center">Latest News</h2>
            <div class="container cards d-flex flex-wrap align-items-center">

                <div class="card m-2">
                    <img src="https://picsum.photos/seed/picsum/300/300?random=1" class="card-img-top" alt="Property 1" loading="lazy">
                    <div class="card-body">
                        <header class="card-head">
                            <a href="#" class="card-title">Post 1</a>
                        </header>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam atque ab aperiam velit rem, nostrum necessitatibus deserunt esse, temporibus labore nulla.</p>
                        <div class="links d-flex justify-content-between align-items-center flex-wrap">
                            <a href="#" class="card-link ">
                                <iconify-icon icon="mdi:read-more"></iconify-icon>
                            </a>
                            <a href="#" class="date">
                                10/10/22
                            </a>
                        </div>
                    </div>
                </div>


                <div class="card m-2">
                    <img src="https://picsum.photos/seed/picsum/300/300?random=1" class="card-img-top" alt="Property 1" loading="lazy">
                    <div class="card-body">
                        <header class="card-head">
                            <a href="#" class="card-title">Post 1</a>
                        </header>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam atque ab aperiam velit rem, nostrum necessitatibus deserunt esse, temporibus labore nulla.</p>
                        <div class="links d-flex justify-content-between align-items-center flex-wrap">
                            <a href="#" class="card-link ">
                                <iconify-icon icon="mdi:read-more"></iconify-icon>
                            </a>
                            <a href="#" class="date">
                                10/10/22
                            </a>
                        </div>
                    </div>
                </div>


                <div class="card m-2">
                    <img src="https://picsum.photos/seed/picsum/300/300?random=1" class="card-img-top" alt="Property 1" loading="lazy">
                    <div class="card-body">
                        <header class="card-head">
                            <a href="#" class="card-title">Post 1</a>
                        </header>
                        <p class="card-text">Lorem ipsum dolor sit amet consectetur adipisicing elit. Laboriosam atque ab aperiam velit rem, nostrum necessitatibus deserunt esse, temporibus labore nulla.</p>
                        <div class="links d-flex justify-content-between align-items-center flex-wrap">
                            <a href="#" class="card-link ">
                                <iconify-icon icon="mdi:read-more"></iconify-icon>
                            </a>
                            <a href="#" class="date">
                                10/10/22
                            </a>
                        </div>
                    </div>
                </div>

                <div class="v-m center">
                    <a href="{{ route("blog") }}" class="btn btn-primary view-more">View More</a>
                </div>
            </div>

        </section>

        <!-- /Latest News -->

    </x-slot>

</x-user-layout>
