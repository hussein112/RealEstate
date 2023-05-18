<x-user-layout>
    <x-slot name="header">
        <x-half-header></x-half-header>
    </x-slot>
    <x-slot name="main">
        @isset($success_msg)
            <h1>{{ $success_msg }}</h1>
        @endisset
        @isset($property)
            <section id="property">
                <!-- Start Slide Show -->
                <div class="container">
                    @if(sizeof($property->images) > 1)
                        <div id="p-carousel1" class="carousel slide card-img-top" data-bs-ride="true">
                            <div class="carousel-indicators">
                                @for($i = 0; $i < sizeof($property->images); $i++)
                                    <button type="button" data-bs-target="#p-carousel1" data-bs-slide-to="{{$i}}" class="active" aria-current="true" aria-label="Slide"></button>
                                @endfor
                            </div>

                            <div class="carousel-inner">
                                @foreach($property->images as $image)
                                    <div class="carousel-item {{ ($loop->first) ? "active" : "" }}">
                                        <img class="d-block w-100" src="{{ asset('storage/' . $image->image) }}" alt="{{ $property->title }}">
                                    </div>
                                @endforeach
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
                    @elseif(sizeof($property->images) == 1)
                        <img class="d-block w-100" src="{{ asset('storage/' . $property->images[0]->image) }}" alt="{{ $property->title }}">
                    @else
                        <img class="d-block w-100" src="{{ asset("storage/defaults/property.jpg") }}" alt="{{ $property->title }}">
                    @endif

                </div>
                <!-- End Slide Show -->


                <article class="container flex">
                    <div class="property">
                        <h1 class="price text-primary">{{ $property->price }} $</h1>
                        @guest
                            <a href="#" data-bs-toggle="modal" data-bs-target="#loginModal">
                                <iconify-icon icon="material-symbols:heart-plus"></iconify-icon>
                            </a>
                        @endguest
                        @auth
                            <form action="{{ route("addToFavourites", ['id' => $property->id]) }}" method="POST">
                                @csrf
                                <button type="submit" class="btn">
                                    <iconify-icon icon="material-symbols:heart-plus"></iconify-icon>
                                </button>
                            </form>
                        @endauth


                        <div class="meta p-5">
                            <h2 class="property-title">{{ $property->title }}</h2>
                            <div class="">
                                <a href="#" class="date">
                                    <iconify-icon icon="ic:baseline-calendar-month"></iconify-icon>
                                    {{ $property->date_posted }}
                                </a>
                                <a href="#" class="type">
                                    <iconify-icon icon="mdi:tag"></iconify-icon>
                                    {{ $property->type->type }}
                                </a>
                                <a href="#" class="bednum">
                                    <iconify-icon icon="mdi:guest-room"></iconify-icon
                                    {{ $property->bedrooms_nb }}
                                </a>
                                <a href="#" class="bathnum">
                                    <iconify-icon icon="mdi:bathroom"></iconify-icon>
                                    {{ $property->bathrooms_nb }}
                                </a>
                                <a href="#" class="space">
                                    <iconify-icon icon="icons8:resize-four-directions"></iconify-icon>
                                    {{ $property->size }}m<sup>2</sup></a>
                            </div>
                        </div>
                        <p class="description">
                            {{ $property->description }}
                        </p>
                        <h3>Features</h3>
                        <ul class="grid custom-list">
                            @if(isset($property->features))
                                @foreach($property->features as $feature)
                                    <li class="list-item">{{ $feature->feature }}</li>
                                @endforeach
                            @else
                                <li class="list-item">No Features</li>
                            @endif
                        </ul>
                    </div>
                    <form action="{{ route("createEnquiry", ['propertyId' => $property->id]) }}" method="post">
                        @csrf
                        <h2>Enquire About This Property</h2>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="name" name="fullname" placeholder="John Doe">
                            <label for="name">Full Name</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="email" class="form-control" id="email" name="email" placeholder="name@example.com">
                            <label for="email">Email address</label>
                        </div>
                        <div class="form-floating mb-3">
                            <input type="text" class="form-control" id="phone" name="phone" placeholder="03 / 123 456">
                            <label for="phone">Phone Number</label>
                        </div>
                        <div class="form-floating">
                            <textarea class="form-control" placeholder="Leave a comment here" id="message" style="height: 100px" name="message"></textarea>
                            <label for="message">Message</label>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" type="submit">Enquire</button>
                        </div>
                    </form>
                </article>

                <div class="container">
                    <h2>Share this property</h2>
                    <ul>
                        <li>
                            <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
                        </li>
                        <li>
                            <a class="twitter-share-button" data-size="large" href="https://twitter.com/intent/tweet">Tweet</a>
                        </li>
                        <li>
                            <a href="whatsapp://send?text={{ url()->current() }}">Whatsapp</a>
                        </li>
                    </ul>
                </div>

                <hr>
                <!-- Start Similar Properties -->
                <div class="similar-properties">
                    <div class="container cards d-flex flex-wrap align-items-center">
                        <h2>Similar Properties</h2>
                        @isset($similar_properties)
                            @foreach($similar_properties as $property)
                                <div class="card m-2">
                                    @if(sizeof($property->images) > 1)
                                        <div id="l-p-carousel1" class="carousel slide card-img-top" data-bs-ride="true">
                                            <div class="carousel-inner">
                                                @foreach($property->images->image as $path)
                                                    <div class="carousel-item {{ ($loop->first) ? "active" : "" }}">
                                                        <img src="{{ asset('storage/' . $path) }}" alt="{{ $property->title }}">
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
                                        <img src="{{ asset('storage/' . $property->images[0]->image) }}" class="d-block w-100" alt="{{ $property->title }}" loading="lazy">
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
                        @endisset
                    </div>
                </div>
                <!-- End Similar Properties -->
            </section>
        @endisset
        <div class="modal fade" tabindex="-1" id="loginModal">
                <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title">Add to Favorites</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                        <div class="modal-body">
                            <p>You Should be Logged in to Save Into Favorite List.</p>
                        </div>
                        <div class="modal-footer">
                            <form action="{{ route('u-login') }}" method="post" class="container flex flex-column flex-wrap">
                                @csrf
                                <div class="form-floating mb-3">
                                    <input type="email" name="email" id="email" class="form-control" placeholder="Email" required autofocus>
                                    <label for="email">Email</label>
                                </div>
                                <div class="form-floating mb-3">
                                    <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                                    <label for="password">Password</label>
                                </div>
                                <div class="mb-3">
                                    <a href="{{ route("password.request") }}">Forgot Password?</a>
                                </div>
                                <div class="form-check mb-3">
                                    <input name="remember" class="form-check-input" type="checkbox" id="remember">
                                    <label class="form-check-label" for="remember">
                                        Remember Me
                                    </label>
                                </div>
                                <div class="mb-3">
                                    Don't Have Account?<a href="{{ route("register") }}"> Register</a>
                                </div>
                                @if($errors->any)
                                    <x-login-errors>
                                        <x-slot name="errors">
                                            @foreach($errors->all() as $error)
                                                <strong class="text-danger">* {{ $error }}</strong>
                                            @endforeach
                                        </x-slot>
                                    </x-login-errors>
                                @endif
                                <button type="submit" class="btn btn-primary m-2">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </x-slot>
</x-user-layout>
