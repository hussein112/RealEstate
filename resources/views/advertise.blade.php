<x-user-layout>
    <x-slot name="header">
        <x-header page="valuation" :types="$types" :wheres="$wheres" :fors="$fors"></x-header>
    </x-slot>

    <x-slot name="main">
        <section class="container">
            <article>
                {!! \Illuminate\Support\Facades\Storage::get('website/about/about.txt') !!}
            </article>
            <h2 class="section-title flex-center">
                Fill the details below to list your property on our website
            </h2>
            @if($errors->any())
                @foreach($errors->all() as $error)
                    <strong class="bg-danger">{{ $error }}</strong>
                @endforeach
            @else
                @if(session('success_msg') != null)
                    <strong class="bg-success">{{ session('success_msg') }}</strong>
                @endif
            @endif
            <form action="{{ route("createAdvertise") }}" method="post">
                @csrf
                <input name="fullname" type="text" class="form-control my-3 mx-1" placeholder="Full Name">
                <input name="email" type="text" class="form-control my-3 mx-1" placeholder="Email Address">
                <input name="phone" type="text" class="form-control my-3 mx-1" placeholder="Telephone Number">

                <h2 class="center">Property Details</h2>

                <h3>Property Type</h3>
                <select name="type" id="propertyType" class="form-select m-2">
                    @foreach($types as $type)
                        <option value="{{ $type->id }}">{{ $type->type }}</option>
                    @endforeach
                </select>

                <h3>Property Location</h3>
                <input name="location" type="text" class="form-control my-3 mx-1" placeholder="City">



                <h3>is this property for:</h3>
                <div class="for-options px-5">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="for" id="forsellradio" checked value="1">
                        <label class="form-check-label" for="forsellradio">
                            Sell
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="for" id="forrentradio" value="2">
                        <label class="form-check-label" for="forrentradio">
                            Rent
                        </label>
                    </div>
                </div>

                <h3>Additional Message</h3>
                <textarea name="message" id="" cols="30" rows="10" class="form-control"></textarea>
                <div class="v-m center mt-3">
                    <button class="btn btn-primary" type="submit">Submit</button>
                </div>
            </form>
        </section>
    </x-slot>

</x-user-layout>
