<x-admin-layout>
<x-slot name="main">
    <main class="admin-property container">
        <h4 class="title my-2 center">Add New Property</h4>
        <div class="container my-5 d-flex flex-column flex-lg-row justify-content-around property-details">
            <hr>
            @if($errors->any)
                @foreach($errors->all() as $error)
                    <strong class="bg-danger text-primary">{{ $error }}</strong>
                @endforeach
            @endif
            <form action="{{ route('a-newProperty') }}" method="post" class="w-100 m-1" enctype="multipart/form-data">
                @csrf
                <input class="form-control my-2" type="text" placeholder="Title" name="title">
                <input type="number" class="form-control my-2" placeholder="Size" name="size">
                <div class="form-check d-flex">
                    <input class="form-check-input" type="checkbox" id="featured" name="featured" value="0">
                    <label class="form-check-label mx-2" for="featured">
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
                <input type="text" class="form-control my-2" placeholder="Add Features Separated By Comma" name="features[]" multiple>
                <div class="mb-3">
                    <label for="images" class="form-label">Choose Property Images</label>
                    <input class="form-control" type="file" id="images" name="images[]" accept="jpg,png,jpeg" multiple>
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </main>
</x-slot>
</x-admin-layout>
