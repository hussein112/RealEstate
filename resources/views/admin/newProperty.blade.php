<x-admin-layout>
<x-slot name="main">
    <main class="container">
        <x-page-title title="property" subtitle="add new property"></x-page-title>

        <x-messages msg="error_msg" type="error"></x-messages>
        <x-messages msg="success_msg" type="success"></x-messages>
        <div class="container d-flex flex-column">
        </div>
            <hr>
            <form action="{{ route('a-newProperty') }}" method="post" class="w-100 m-1" enctype="multipart/form-data">
                @csrf
                <input class="form-control my-2" type="text" placeholder="Title" name="title" maxlength="90" required>
                @if($errors->has('title'))
                    <div class="error text-danger">* {{$errors->first('title')}}</div>
                @endif
                <input type="number" class="form-control my-2" placeholder="Size" name="size" required>
                @if($errors->has('size'))
                    <div class="error text-danger">* {{$errors->first('size')}}</div>
                @endif
                <div class="form-check">
                    <input class="form-check-input" type="checkbox" name="featured" value="1" id="featuredCheck">
                    <label class="form-check-label" for="featuredCheck">
                        Featured?
                    </label>
                </div>
                <input type="number" class="form-control my-2" placeholder="Price" name="price" required>
                @if($errors->has('price'))
                    <div class="error text-danger">* {{ ucfirst($errors->first('price')) }}</div>
                @endif
                <input type="text" class="form-control my-2" placeholder="City" name="city" maxlength="15" required>
                @if($errors->has('city'))
                    <div class="error text-danger">* {{ ucfirst($errors->first('city')) }}</div>
                @endif
                <input type="text" class="form-control my-2" placeholder="Address" name="address" maxlength="150" required>
                @if($errors->has('address'))
                    <div class="error text-danger">* {{ ucfirst($errors->first('address')) }}</div>
                @endif
                <input type="number" name="bedrooms" class="form-control my-2" placeholder="Number of Bedrooms" required>
                @if($errors->has('bedrooms'))
                    <div class="error text-danger">* {{ ucfirst($errors->first('bedrooms')) }}</div>
                @endif
                <input type="number" name="bathrooms" class="form-control my-2" placeholder="Number of Bathrooms" required>
                @if($errors->has('bathrooms'))
                    <div class="error text-danger">* {{ ucfirst($errors->first('bathrooms')) }}</div>
                @endif
                <select name="type" class="form-select my-2" required>
                    <option selected disabled>-- Type --</option>
                    @isset($types)
                        @foreach($types as $type)
                            <option value="{{ $type->id }}">{{ $type->type }}</option>
                        @endforeach
                    @endisset
                </select>
                @if($errors->has('bathrooms'))
                    <div class="error text-danger">* {{ ucfirst($errors->first('bathrooms')) }}</div>
                @endif
                <select name="for" class="form-select my-2" required>
                    <option selected disabled>-- For --</option>
                    <option value="rent">Rent</option>
                    <option value="buy">Buy</option>
                </select>
                @if($errors->has('for'))
                    <div class="error text-danger">* {{ ucfirst($errors->first('for')) }}</div>
                @endif
                <input type="date" name="until" class="my-2" required>
                @if($errors->has('until'))
                    <div class="error text-danger">* {{ ucfirst($errors->first('until')) }}</div>
                @endif
                <div class="input-group">
                    <select name="owner" class="form-select" aria-describedby="test" required>
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
                    @if($errors->has('owner'))
                        <div class="error text-danger">* {{ ucfirst($errors->first('owner')) }}</div>
                    @endif
                </div>
                <textarea name="description" cols="30" rows="10" class="form-control my-2" placeholder="Description"></textarea>
                @if($errors->has('description'))
                    <div class="error text-danger">* {{ ucfirst($errors->first('description')) }}</div>
                @endif

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
                @if(session('features_error'))
                    <div class="error text-danger">* {{ ucfirst(session('features_error')) }}</div>
                @endif
                @vite("resources/js/admin/features.js")
                <div id="hk-input-csv"></div>
                <script src="https://cdn.jsdelivr.net/gh/hussein112/TagsInput@1.0/tagsinput.min.js"></script>

                <div class="mb-3">
                    <label for="images" class="form-label">Choose Property Images</label>
                    <input class="form-control" type="file" id="images" name="images[image][]" accept="jpg,png,jpeg" multiple required>
                    @if($errors->has("images.image"))
                        <div class="error text-danger">* {{ ucfirst($errors->first("images.image")) }}</div>
                    @endif
                </div>

                <button type="submit" class="btn btn-primary add-product">Add</button>
            </form>
    </main>
</x-slot>
</x-admin-layout>
