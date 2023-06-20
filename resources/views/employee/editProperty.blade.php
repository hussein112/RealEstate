<x-employee.layout>
    <x-slot name="main">
        <main class="container">
            @isset($property)
                <x-page-title title="property" subtitle="edit property #{{$property->id}}"></x-page-title>
                <div class="container d-flex flex-column">
                    @if($errors->any())
                        @foreach($errors->all() as $error)
                            <strong class="bg-danger text-light p-2 m-1">{{ $error  }}</strong>
                        @endforeach
                    @else
                        <x-messages msg="success_msg" type="success"></x-messages>
                    @endif
                </div>

                <div class="container my-5 d-flex flex-column flex-lg-row justify-content-around property-details">
                    <hr>
                    <form id="update-user-profile" action="{{ route('e-editProperty', ['id' => $property->id]) }}" method="post" class="w-100 m-1">
                        @method("PATCH")
                        @csrf
                        <select name="owner" class="form-select my-2">
                            @foreach($customers as $customer)
                                <option value="{{ $customer->id }}" @selected($customer->id == $property->customer_id)>{{$customer->full_name}}</option>
                            @endforeach
                        </select>
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
                        <input class="form-control my-2" name="location" type="text" placeholder="Location" value="{{ $property->city }}">
                        <input class="form-control my-2" name="location" type="text" placeholder="Address" value="{{ $property->address }}">
                        <input type="number" name="bedrooms" id="" class="form-control my-2" placeholder="Number of Bedrooms" value="{{ $property->bedrooms_nb }}">
                        <input type="number" name="bathrooms" id="" class="form-control my-2" placeholder="Number of Bathrooms" value="{{ $property->bathrooms_nb }}">
                        @vite("resources/js/admin/features.js")
                        <div id="hk-input-csv"></div>
                        <script src="https://cdn.jsdelivr.net/gh/hussein112/TagsInput@1.0/tagsinput.min.js"></script>
                        <select name="features" class="form-select" aria-describedby="test" onchange="window.csvinput.manualTag(this)">
                            @if(sizeof($features) > 0)
                                <option selected disabled>-- Features --</option>
                                @foreach($features as $feature)
                                    <option value="{{ $feature->id }}">{{ $feature->feature }}</option>
                                @endforeach
                            @else
                                <option disabled selected>-- No Customers, Yet --</option>
                            @endif
                            @if($errors->has('features'))
                                <div class="error text-danger">* {{ ucfirst($errors->first('features')) }}</div>
                            @endif
                        </select>
                        <select name="type" id="" class="form-select my-2">
                            @foreach($types as $type)
                                <option value="{{ $type->id }}" @selected($property->type->id == $type->id)>{{ $type->type }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary" id="update-profile">Update</button>
                    </form>


                    <!-- Start Images & Features -->
                    <div class="right-side-wrapper w-100 m-1">
                        <div class="images">
                            <div>
                                <input type="file" name="new-image" id="new-image">
                            </div>
                            @isset($property->images)
                                <!-- Modal Dialog CSS EDITS
                                        max-width: none; */
                                        /* margin-right: none; */
                                        /* margin-left: none; -->
                                <div class="floating-edit">
                                    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                        <iconify-icon icon="material-symbols:edit"></iconify-icon>
                                    </button>
                                    <!-- Modal -->
                                    <div class="modal fade w-100" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h1 class="modal-title fs-5" id="exampleModalLabel">Edit Property Images</h1>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                </div>
                                                <div class="modal-body">
                                                    <!-- Start Property Image Gallery  -->
                                                    <div class="row">
                                                        @php($prop_images = "")
                                                        @foreach($property->images as $key)
                                                            @php($prop_images .= "," . $key->id)
                                                            <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                                                                <div class="image">
                                                                    <img
                                                                        src="{{ asset('storage/' . $key->image) }}"
                                                                        class="w-100 shadow-1-strong rounded mb-4"
                                                                        alt="{{ $property->title }}"
                                                                        loading="lazy"
                                                                    />
                                                                    <div class="actions">
                                                                        <input type="file" name="image" id="update-image-{{$key->id}}" class="btn btn-info m-1">
                                                                        <iconify-icon icon="material-symbols:edit"></iconify-icon>
                                                                        </input>
                                                                        <!-- Delete the previous, add the new -->
                                                                        <button id="delete-{{$key->id}}" class="btn btn-danger m-1" type="button">
                                                                            <iconify-icon icon="mdi:delete"></iconify-icon>
                                                                        </button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        @endforeach
                                                        @if($prop_images != "")
                                                            <script>
                                                                // Data Passed to the Vite File
                                                                let keys = "{{$prop_images}}"
                                                                let CSSRF = "{{@csrf_token()}}"
                                                                let prop_id = {{$property->id}}

                                                            </script>
                                                        @endif
                                                        @vite("resources/js/common/alterPropertyImages.js")
                                                    </div>
                                                    <!-- End Property Image Gallery -->
                                                </div>
                                                <div class="modal-footer">
                                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                                    <button type="button" class="btn btn-primary">Save changes</button>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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
                        </div>

                        <div class="features">
                            <div class="features grid-text">
                                <div class="features grid-text">
                                    @if(sizeof($property->features) > 0)
                                        @php($featureIDs = "")
                                        @foreach($property->features as $feature)
                                            <div class="feature">
                                                {{ $feature->feature }}
                                                <div class="actions">
                                                    <form action="{{ route("c-removeFeature", ['id' => $feature->id, 'property_id' => $property->id]) }}" method="POST">
                                                        @csrf
                                                        @method("PATCH")
                                                        <button type="submit" class="btn btn-primary">
                                                            <iconify-icon icon="material-symbols:remove"></iconify-icon>
                                                        </button>
                                                    </form>

                                                    <form id="delete-feature-{{$feature->id}}-form" action="{{ route("c-deleteFeature", ['id' => $feature->id]) }}" method="POST">
                                                        @csrf
                                                        @method("DELETE")
                                                        <button id="delete-feature-{{$feature->id}}" type="submit" class="btn btn-primary">
                                                            <iconify-icon icon="mdi:delete"></iconify-icon>
                                                        </button>
                                                    </form>
                                                    @php($featureIDs .= ',' . $feature->id)
                                                </div>
                                            </div>
                                        @endforeach
                                        <script>
                                            let feature_ids = "{{$featureIDs}}"
                                            let fe = feature_ids.split(",");
                                            fe.forEach(id => {
                                                if(id !== ''){
                                                    document.getElementById("delete-feature-" + id).addEventListener("click", (e) => {
                                                        e.preventDefault();
                                                        let DELETE_FEATURE_MESSAGE = "Are you sure you want to PERMANANTLY delete this feature? it will be remove from all properties it belongs to.";
                                                        if(confirm(DELETE_FEATURE_MESSAGE)){
                                                            document.getElementById("delete-feature-" + id + "-form").submit();
                                                        }
                                                    });
                                                }
                                            })

                                        </script>
                                    @else
                                        <div class="feature">No Features</div>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <!-- End Images & Features -->
            @endisset
        </main>
    </x-slot>

</x-employee.layout>
<x-confirmation-dialog title="Update Property" body="Are you sure you want to update the property?"></x-confirmation-dialog>
