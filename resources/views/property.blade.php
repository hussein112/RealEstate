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
                                    <button type="button" data-bs-target="#p-carousel1" data-bs-slide-to="{{$i}}" @if($i == 0) class="active" @endif aria-current="true" aria-label="Slide"></button>
                                @endfor
                            </div>

                            <div class="carousel-inner">
                                @foreach($property->images as $image)
                                    <div class="carousel-item {{ ($loop->first) ? "active" : "" }}">
                                        <img class="property-image" src="{{ asset('storage/' . $image->image) }}" alt="{{ $property->title }}">
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
                        <h1 class="price">{{ number_format($property->price, 2) }} $</h1>
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

                        <div class="meta">
                            <h2 class="property-title">{{ $property->title }}</h2>
                            <div class="contain">
                                <a href="#" class="date flex-center">
                                    <iconify-icon icon="ic:baseline-calendar-month"></iconify-icon>
                                    @php($date = new \Illuminate\Support\Carbon($property->date_posted))
                                    <span>{{ $date->toDateString() }}</span>
                                </a>
                                <a href="#" class="type flex-center">
                                    <iconify-icon icon="mdi:tag"></iconify-icon>
                                    <span>{{ $property->type->type }}</span>
                                </a>
                                <a href="#" class="bednum flex-center">
                                    <iconify-icon icon="mdi:guest-room"></iconify-icon>
                                    <span>{{ $property->bedrooms_nb }}</span>
                                </a>
                                <a href="#" class="bathnum flex-center">
                                    <iconify-icon icon="mdi:bathroom"></iconify-icon>
                                    <span>{{ $property->bathrooms_nb }}</span>
                                </a>
                                <a href="#" class="space flex-center">
                                    <iconify-icon icon="icons8:resize-four-directions"></iconify-icon>
                                    <span>{{ $property->size }}m<sup>2</sup></span>
                                </a>
                            </div>
                        </div>
                        <div class="description">
                            <h3>Description</h3>
                            <p>{{ $property->description }}</p>
                        </div>
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
                        <div class="form-floating mb-3">
                            <textarea class="form-control" placeholder="Leave a comment here" id="message" style="height: 100px" name="message"></textarea>
                            <label for="message">Message</label>
                        </div>
                        <div class="col-12 mt-1">
                            <button class="btn btn-primary" type="submit">Enquire</button>
                        </div>
                    </form>
                </article>

                <div class="container">
                    <h3>Share</h3>
                    <div class="flex w-25">
                        <div class="fb-share-button" data-href="https://developers.facebook.com/docs/plugins/" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=https%3A%2F%2Fdevelopers.facebook.com%2Fdocs%2Fplugins%2F&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Share</a></div>
                        <a class="twitter-share-button" data-size="large" href="https://twitter.com/intent/tweet">Tweet</a>
                        <a href="whatsapp://send?text={{ url()->current() }}">Whatsapp</a>
                    </div>
                </div>

                <hr>
                <!-- Start Similar Properties -->
                <div class="similar-properties">
                    <div class="container">
                        <h2>Similar Properties</h2>
                            @if(isset($similar_properties) && sizeof($similar_properties) > 0)
                                <div class="container cards d-flex flex-wrap align-items-center">
                                    @foreach($similar_properties as $property)
                                        <div class="card m-2">
                                            @if(sizeof($property->images) > 1)
                                                <div id="l-p-carousel1" class="carousel slide card-img-top" data-bs-ride="true">
                                                    <div class="carousel-inner">
                                                        @foreach($property->images as $path)
                                                            <div class="carousel-item {{ ($loop->first) ? "active" : "" }}">
                                                                <img src="{{ asset('storage/' . $path->image) }}" alt="{{ $property->title }}">
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
                                            @elseif(sizeof($property->images) == 1)
                                                <img src="{{ asset('storage/' . $property->images[0]->image) }}" class="d-block w-100" alt="{{ $property->title }}" loading="lazy">
                                            @endif

                                            <div class="card-body">
                                                <header class="card-head">
                                                    <a href="{{ route('property', ['id' => $property->id]) }}" class="card-title">{{ $property->title }}</a>
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
                                                                <span>{{ number_format($property->price, 2) }}</span>
                                                            </a>
                                                        </h6>
                                                        <h6 class="card-subtitle">
                                                            <a href="{{ route("searchByBedroomsNumber", ['nb' => $property->bedrooms_nb]) }}" class="text-capitalize text-muted flex-center">
                                                                <iconify-icon icon="mdi:guest-room"></iconify-icon>
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
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </div>
                            @else
                                <h6>None</h6>
                            @endif
                    </div>
                </div>
                <!-- End Similar Properties -->
            </section>
        @endisset
        <!-- Start Login Modal -->
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
                                    @foreach($errors->all() as $error)
                                        <strong class="text-danger">* {{ $error }}</strong>
                                    @endforeach
                                @endif
                                <button type="submit" class="btn btn-primary m-2">Login</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        <!-- End Login Modal -->

    </x-slot>
</x-user-layout>
