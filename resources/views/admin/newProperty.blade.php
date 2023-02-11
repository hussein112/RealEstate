<x-admin-layout>
<x-slot name="main">
    <main class="admin-property container">
        <h4 class="title my-2 center">Add New Property</h4>
        <div class="container my-5 d-flex flex-column flex-lg-row justify-content-around property-details">
            <hr>

            <form action="" method="post" class="w-100 m-1">
                <input class="form-control my-2" type="text" placeholder="Title" name="title">
                <input type="number" class="form-control my-2" placeholder="Size" name="size">
                <div class="form-check d-flex">
                    <input class="form-check-input" type="checkbox" id="featured">
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
                    <option value="">Rent</option>
                    <option value="">Buy</option>
                </select>
                <select name="owner" class="form-select my-2">
                    <option selected disabled>-- Owner --</option>
                    @isset($customers)
                        @foreach($customers as $customer)
                            <option value="{{ $customer->id }}">{{ $customer->full_name }}</option>
                        @endforeach
                    @endisset
                </select>
                <textarea name="description" cols="30" rows="10" class="form-control my-2" placeholder="Description"></textarea>
                <input type="text" class="form-control my-2" placeholder="Add Features Separated By Comma" name="features[]">
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </div>
    </main>
</x-slot>
</x-admin-layout>
