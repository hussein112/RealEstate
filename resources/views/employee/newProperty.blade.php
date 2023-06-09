<x-employee.layout>
    <x-slot name="main">
        <main class="admin-property container">
            <x-page-title title="property" subtitle="Add new Property"></x-page-title>

            <x-messages msg="error_msg" type="danger"></x-messages>
            <x-messages msg="success_msg" type="success"></x-messages>
            <div class="container d-flex flex-column">
                @if($errors->any())
                    <h3>Error Inserting Property</h3>
                    @foreach($errors->all() as $error)
                        <strong class="bg-success text-light m-1 p-1">{{ $error }}</strong>
                    @endforeach
                @endif
            </div>
            <hr>
            <form action="{{ route('e-newProperty') }}" method="post" class="w-100 m-1" enctype="multipart/form-data">
                @csrf
                <input class="form-control my-2" type="text" placeholder="Title" name="title">
                <input type="number" class="form-control my-2" placeholder="Size" name="size">
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="featured" value="1" id="featuredCheck">
                    <label class="form-check-label" for="featuredCheck">
                        Featured?
                    </label>
                </div>
                <input type="number" class="form-control my-2" placeholder="Price" name="price">
                <input type="text" class="form-control my-2" placeholder="City" name="city">
                <input type="text" class="form-control my-2" placeholder="Address" name="address">
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
                <input type="date" name="until" class="my-2">
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
                </div>
                <textarea name="description" cols="30" rows="10" class="form-control my-2" placeholder="Description"></textarea>
                @vite("resources/js/admin/features.js")
                <div id="hk-input-csv"></div>
                <script src="https://cdn.jsdelivr.net/gh/hussein112/TagsInput@1.0/tagsinput.min.js"></script>
                <select name="features" class="form-select" aria-describedby="test" onchange="window.tagsinput.manualTag(this)">
                    @if(sizeof($features) > 0)
                        <option selected disabled>-- Features --</option>
                        @foreach($features as $feature)
                            <option value="{{ $feature->id }}">{{ $feature->feature }}</option>
                        @endforeach
                    @endif
                </select>
                @if(session('features_error'))
                    <div class="error text-danger">* {{ ucfirst(session('features_error')) }}</div>
                @endif

                <div class="mb-3">
                    <label for="images" class="form-label">Choose Property Images</label>
                    <input class="form-control" type="file" id="images" name="images[image][]" accept="jpg,png,jpeg" multiple>
                </div>
                <button type="submit" class="btn btn-primary add-product">Add</button>
            </form>
        </main>
    </x-slot>
</x-employee.layout>
