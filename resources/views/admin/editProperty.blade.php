<x-admin-layout>
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
                    <form id="update-user-profile" action="{{ route("a-editProperty", ['id' => $property->id]) }}" method="post" class="w-100 m-1">
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
                        <input class="form-control my-2" name="location" type="text" placeholder="Location" value="{{ $property->location }}">
                        <input type="number" name="bedrooms" id="" class="form-control my-2" placeholder="Number of Bedrooms" value="{{ $property->bedrooms_nb }}">
                        <input type="number" name="bathrooms" id="" class="form-control my-2" placeholder="Number of Bathrooms" value="{{ $property->bathrooms_nb }}">
                        <select name="type" class="form-select my-2">
                            @foreach($types as $type)
                                <option value="{{ $type->id }}" @selected($property->type->id == $type->id)>{{ $type->type }}</option>
                            @endforeach
                        </select>
                        <button type="submit" class="btn btn-primary" id="update-profile">Update</button>
                    </form>

                    <!-- Start Images & Features -->
                    <div class="right-side-wrapper w-100 m-1">
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
                                                        @php($prop_images .= "," . $key->id))
                                                        <div class="col-lg-4 col-md-12 mb-4 mb-lg-0">
                                                        <div class="image">
                                                            <img
                                                                src="{{ asset('storage/' . $key->image) }}"
                                                                class="w-100 shadow-1-strong rounded mb-4"
                                                                alt="{{ $property->title }}"
                                                                loading="lazy"
                                                            />
                                                            <div class="actions">
                                                                <iconify-icon icon="material-symbols:edit"></iconify-icon>
                                                                <button id="delete-{{$key->id}}" class="btn btn-danger m-1" type="button">
                                                                    <iconify-icon icon="mdi:delete"></iconify-icon>
                                                                </button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    @endforeach
                                                        <script>
                                                            let keys = "{{$prop_images}}"
                                                            let ids = keys.split(",");
                                                            ids.forEach(id => {
                                                                if(id !== ''){
                                                                    document.getElementById("delete-" + id).addEventListener("click", () => {
                                                                        if(confirm("Are you sure you want to delete image #" + id)){
                                                                            axios.delete(`http://127.0.0.1:8000/admin/delete/images/${id}`, {
                                                                                headers: {
                                                                                    'X-CSRF-TOKEN': "{{ csrf_token() }}"
                                                                                }
                                                                            }).then(response => {
                                                                                location.reload();
                                                                            }).catch(error => {
                                                                                alert(error);
                                                                            });
                                                                        }
                                                                    });
                                                                }
                                                            });
                                                        </script>
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
                    <!-- End Images & Features -->

                </div>
            @endisset
        </main>
    </x-slot>

</x-admin-layout>
<x-confirmation-dialog title="Update Property" body="Are you sure you want to update the property?"></x-confirmation-dialog>
