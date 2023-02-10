<x-admin-layout>
    <x-slot name="main">
        <main class="admin-property container">
            @isset($property)
                <h4 class="title my-2 center">Edit Property <strong class="d-">#{{ $property->id }}</strong></h4>
                <div class="container my-5 d-flex flex-column flex-lg-row justify-content-around property-details">
                    <hr>
                    @if(session('success_msg'))
                        <div class="strong bg-danger text-light">{{ session('success_message') }}</div>
                    @endif
                    <form action="" method="post" class="w-100 m-1">
                        @method("PATCH")
                        @csrf
                        <input name="ownerfname" class="form-control my-2" type="text" placeholder="Owner Name" value="{{ $property->owner->full_name }}">
                        <input name="title" class="form-control my-2" type="text" placeholder="Title" value="{{ $property->title }}">
                        <input name="size" class="form-control my-2" type="number" placeholder="Size" value="{{ $property->size }}">
                        <textarea name="description" id="" cols="30" rows="10" class="form-control my-2" placeholder="Description">{{ $property->description }}</textarea>
                        <input name="price" class="form-control my-2" type="number" placeholder="Price" value="{{ $property->price }}">
                        <div class="form-check d-flex">
                            <input class="form-check-input" type="checkbox" id="featured" value="">
                            <label class="form-check-label mx-2" for="featured" name="featured">
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
                        <div id="property1" class="carousel slide property-slides" data-bs-ride="true">


                            <div class="carousel-indicators">
                                <button type="button" data-bs-target="#property1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                                <button type="button" data-bs-target="#property1" data-bs-slide-to="1" aria-label="Slide 2"></button>
                                <button type="button" data-bs-target="#property1" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>

                            <div class="carousel-inner">
                                <div class="carousel-item active">
                                    <img src="https://picsum.photos/200/300" class="d-block w-100" alt="..." loading="lazy">
                                    <div class="carousel-btns">
                                        <iconify-icon icon="material-symbols:edit-sharp" type="button" data-bs-toggle="modal" data-bs-target="#editModal"></iconify-icon>
                                        <iconify-icon icon="ic:round-delete" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal"></iconify-icon>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="https://picsum.photos/200/300" class="d-block w-100" alt="..." loading="lazy">
                                    <div class="carousel-btns">
                                        <iconify-icon icon="material-symbols:edit-sharp" type="button" data-bs-toggle="modal" data-bs-target="#editModal"></iconify-icon>
                                        <iconify-icon icon="ic:round-delete" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal"></iconify-icon>
                                    </div>
                                </div>
                                <div class="carousel-item">
                                    <img src="https://picsum.photos/200/300" class="d-block w-100" alt="..." loading="lazy">
                                    <div class="carousel-btns">
                                        <iconify-icon icon="material-symbols:edit-sharp" type="button" data-bs-toggle="modal" data-bs-target="#editModal"></iconify-icon>
                                        <iconify-icon icon="ic:round-delete" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal"></iconify-icon>
                                    </div>
                                </div>
                            </div>

                            <button class="carousel-control-prev" type="button" data-bs-target="#property1" data-bs-slide="prev">
                                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Previous</span>
                            </button>

                            <button class="carousel-control-next" type="button" data-bs-target="#property1" data-bs-slide="next">
                                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                                <span class="visually-hidden">Next</span>
                            </button>

                        </div>

                        <div class="features grid-text">
                            @isset($property->features)
                                @foreach($property->features as $feature)
                                    <div class="feature">{{ $feature }}</div>
                                @endforeach
                                <div class="feature">No Features</div>
                            @endisset
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
