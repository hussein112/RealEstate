<x-admin-layout>
<x-slot name="main">
    <main class="admin-property container">
        <h4 class="title my-2 center">Add New Property</h4>
        <div class="container d-flex flex-column">
            @if($errors->any())
                    <h3>Error Inserting Property</h3>
                    @foreach($errors->all() as $error)
                        <strong class="bg-success text-light m-1 p-1">{{ $error }}</strong>
                    @endforeach
            @elseif(session('success_msg'))
                <strong class="bg-success text-danger m-1 p-1">{{ session('success_msg') }}</strong>
            @endif
        </div>
        <div class="container my-5 d-flex flex-column flex-lg-row justify-content-around property-details">
            <hr>
            <form action="{{ route('a-newProperty') }}" method="post" class="w-100 m-1" enctype="multipart/form-data">
                @csrf
                <input type="hidden" value="{{ (\App\Models\Property::latest("id")->first()->id + 1) }}" id="pr-id">
                <input class="form-control my-2" type="text" placeholder="Title" name="title">
                <input type="number" class="form-control my-2" placeholder="Size" name="size">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="featured" value="1" id="featuredCheck">
                    <label class="form-check-label" for="featuredCheck">
                        Featured?
                    </label>
                </div>
                <input type="number" class="form-control my-2" placeholder="Price" name="price">
                <input type="text" class="form-control my-2" placeholder="Location" name="location">
                <input type="number" name="bedrooms" class="form-control my-2" placeholder="Number of Bedrooms">
                <input type="number" name="bathrooms" class="form-control my-2" placeholder="Number of Bathrooms">
                <select name="type" class="form-select my-2">
                    <option selected disabled>-- Type --</option>
                    @isset($types)
                        @foreach($types as $type)
                            <option value="{{ $type->id }}">{{ $type->type }}</option>
                        @endforeach
                    @endisset
                </select>
                <select name="for" class="form-select my-2">
                    <option selected disabled>-- For --</option>
                    <option value="rent">Rent</option>
                    <option value="buy">Buy</option>
                </select>
                <div class="input-group">
                    <select name="owner" class="form-select" aria-describedby="test">
                        @if(sizeof($customers) > 0)
                            <option selected disabled>-- Owner --</option>
                        @foreach($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->full_name }}</option>
                            @endforeach
                        @else
                            <option disabled selected>-- No Customers, Yet --</option>
                        @endif
                    </select>
                    <a href="{{ route('a-newCustomer') }}" id="test" class="btn btn-outline-primary">New</a>
                </div>
                <textarea name="description" cols="30" rows="10" class="form-control my-2" placeholder="Description"></textarea>
                @vite('resources/js/admin/features.js')
                <select name="features" class="form-select" aria-describedby="test" onchange="window.csvinput.manualTag(this)">
                    @if(sizeof($features) > 0)
                        <option selected disabled>-- Features --</option>
                        @foreach($features as $feature)
                            <option value="{{ $feature->id }}">{{ $feature->feature }}</option>
                        @endforeach
                    @else
                        <option disabled selected>-- No Customers, Yet --</option>
                    @endif
                </select>
                <div id="hk-input-csv"></div>

                <div class="mb-3">
                    <label for="images" class="form-label">Choose Property Images</label>
                    <input class="form-control" type="file" id="images" name="images[image][]" accept="jpg,png,jpeg" multiple>
                </div>
                <button type="submit" class="btn btn-primary add-product">Add</button>
            </form>
        </div>
    </main>
</x-slot>
</x-admin-layout>
