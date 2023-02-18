<x-admin-layout>
    <x-slot name="main">
        <main class="admin-property container">
            @isset($property)
                <h4 class="title my-2 center">Edit Property <strong class="d-">#{{ $property->id }}</strong></h4>
                <div class="container d-flex flex-column">

                @if($errors->any())
                    @foreach($errors->all() as $error)
                            <strong class="bg-danger text-light p-2 m-1">{{ $error  }}</strong>
                    @endforeach
                @elseif(session('success_msg'))
                    <strong class="bg-success text-light p-2 m-1">{{ session('success_msg') }}</strong>
                @endif
                </div>

                <div class="container my-5 d-flex flex-column flex-lg-row justify-content-around property-details">
                    <hr>

                    <form action="" method="post" class="w-100 m-1">
                        @method("PATCH")
                        @csrf
                        <input name="ownerfname" class="form-control my-2" type="text" placeholder="Owner Name" value="{{ $property->owner->full_name }}">
                        <input name="title" class="form-control my-2" type="text" placeholder="Title" value="{{ $property->title }}">
                        <input name="size" class="form-control my-2" type="number" placeholder="Size" value="{{ $property->size }}">
                        <textarea name="description" cols="30" rows="10" class="form-control my-2" placeholder="Description">{{ $property->description }}</textarea>
                        <input name="price" class="form-control my-2" type="number" placeholder="Price" value="{{ $property->price }}">
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="featured" value="1" id="featuredCheck" @checked($property->featured == 1)>
                            <label class="form-check-label" for="featuredCheck">
                                Featured?
                            </label>
                        </div>
                        <input class="form-control my-2" name="location" type="text" placeholder="Location" value="{{ $property->location }}">
                        <input type="number" name="bedrooms" id="" class="form-control my-2" placeholder="Number of Bedrooms" value="{{ $property->bedrooms_nb }}">
                        <input type="number" name="bathrooms" id="" class="form-control my-2" placeholder="Number of Bathrooms" value="{{ $property->bathrooms_nb }}">
                        <select name="type" id="" class="form-select my-2">
                            @foreach($types as $type)
                                <option value="{{ $type->id }}" @selected($property->type->id == $type->id)>{{ $type->type }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary">Update</button>
                    </form>


                        <div class="right-side-wrapper w-100 m-1">
                            @isset($property->images)
                                <div id="property" class="carousel slide property-slides" data-bs-ride="true">
                                    <div class="carousel-indicators">
                                        @for($i = 0; $i < sizeof($property->images); $i++)
                                            <button type="button" data-bs-target="#property" data-bs-slide-to="{{ $i }}" class="{{ ($i == 0) ? 'active' : '' }}" aria-current="{{ ($i == 0) ? 'true' : '' }}" aria-label="Slide {{ $i }}"></button>
                                        @endfor
                                    </div>

                                    <div class="carousel-inner">
                                        @foreach($property->images as $key)
                                            <div class="carousel-item @if($loop->first) active @endif">
                                                <img src="{{ asset('storage/' . $key->image) }}" class="d-block w-100" style="height: 250px; max-height: 300px" alt="{{ $property->title }}" loading="lazy">
                                                <div class="carousel-btns">
                                                    <iconify-icon icon="material-symbols:edit-sharp" type="button" data-bs-toggle="modal" data-bs-target="#editModal"></iconify-icon>
                                                    <iconify-icon icon="ic:round-delete" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal"></iconify-icon>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>

                                    <button class="carousel-control-prev" type="button" data-bs-target="#property" data-bs-slide="prev">
                                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Previous</span>
                                    </button>

                                    <button class="carousel-control-next" type="button" data-bs-target="#property" data-bs-slide="next">
                                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                        <span class="visually-hidden">Next</span>
                                    </button>
                                </div>
                            @endisset

                        <div class="features grid-text">
                            @if(sizeof($property->features) > 0)
                                @foreach($property->features as $feature)
                                    <div class="feature">{{ $feature->feature }}</div>
                                @endforeach
                            @else
                                <div class="feature">No Features</div>
                            @endif
                        </div>
                    </div>



                    <!-- Start Delete Modal -->
                    <div class="modal" tabindex="-1" id="deleteModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Delete Image</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p class="text-capitalize">Are you Sure you want to delete image <strong>924738.jpg</strong>?</p>
                                    <img src="https://picsum.photos/200/300" class="d-block w-100" alt="..." loading="lazy">
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-danger">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Delete Modal -->


                    <!-- Start Edit Modal -->
                    <div class="modal" tabindex="-1" id="editModal">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title">Change Image</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <form action="">
                                        <div class="mb-3">
                                            <input class="form-control form-control-sm" id="newImage" type="file">
                                        </div>
                                    </form>
                                </div>
                                <div class="modal-footer">
                                    <button type="button" class="btn btn-success" data-bs-dismiss="modal">Cancel</button>
                                    <button type="button" class="btn btn-danger">Update</button>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- End Edit Modal -->
                </div>
            @endisset
        </main>
    </x-slot>

</x-admin-layout>
