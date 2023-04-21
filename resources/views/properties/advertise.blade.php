<x-user-layout>
    <x-slot name="header">
        <x-header page="page" :types="$types" :wheres="$wheres" :fors="$fors"></x-header>
    </x-slot>
    <x-slot name="main">
        <section id="advertise">
            <h2 class="section-title center">List Your Property In Our Website</h2>
            <div class="container d-flex flex-wrap justify-content-around">
                <form action="{{ route("createValuation") }}" method="post">
                    @csrf
                    <h2>About You</h2>
                    <input name="fullname" type="text" class="form-control my-3 mx-1" placeholder="Full Name">
                    <input name="email" type="text" class="form-control my-3 mx-1" placeholder="Email Address">
                    <input name="phone" type="text" class="form-control my-3 mx-1" placeholder="Telephone Number">
                    <h2 class="center">Property Details</h2>
                    <div class="address grid">
                        <input name="addressone" type="text" class="form-control" placeholder="Address Line 1">
                        <input name="addresstwo" type="text" class="form-control" placeholder="Address Line 2">
                        <input name="state" type="text" class="form-control" placeholder="State">
                        <input name="postalcode" type="text" class="form-control" placeholder="Postal/Zip Code">
                        <input name="city" type="text" class="form-control" placeholder="Town/City">
                    </div>
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


                    <h3>is it: </h3>
                    <div class="furnishing-options px-5">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="furnishing" id="fullyfurnishedradio" value="2" checked>
                            <label class="form-check-label" for="fullyfurnishedradio">
                                Fully Furnished
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="furnishing" id="partlyfurnishedradio" value="1">
                            <label class="form-check-label" for="partlyfurnishedradio">
                                Partially Furnished
                            </label>
                        </div>


                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="furnishing" id="notfurnishedradio" value="0">
                            <label class="form-check-label" for="notfurnishedradio">
                                Not Furnished
                            </label>
                        </div>
                    </div>


                    <h3>number of bedrooms</h3>
                    <div class="center my-3">
                        <input name="bedrooms" type="number" class="form-control m-2" placeholder="Number of Bedrooms">
                    </div>

                    <h3>number of bathrooms</h3>
                    <div class="center my-3">
                        <input name="bathrooms" type="number" class="form-control m-2" placeholder="Number of Bathrooms">
                    </div>

                    <h3>Property Type</h3>

                    <select name="type" id="propertyType" class="form-select m-2">
                        @foreach($types as $type)
                            <option value="{{ $type->type }}">{{ $type->type }}</option>
                        @endforeach
                    </select>

                    <div class="garage my-2">
                        <label class="form-check-label" for="garage">Includes Garage</label>
                        <input type="checkbox" class="nav-link" id="garage" checked data-toggle="toggle" name="garage">
                    </div>

                    <!-- Want to make it featured ? -->
                    <div class="garage my-2">
                        <label class="form-check-label" for="garage">Make it Featured?</label>
                        <input type="checkbox" class="nav-link" id="garage" checked data-toggle="toggle" name="garage">
                    </div>

                    <!-- Period of Advertisement -->
                    <h3>How much you want it to be listed:</h3>
                    <div class="furnishing-options px-5">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="period" id="" value="" checked>
                            <label class="form-check-label" for="">
                                1 Week
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="period" id="" value="">
                            <label class="form-check-label" for="">
                                1 Month
                            </label>
                        </div>


                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="period" id="" value="">
                            <label class="form-check-label" for="">
                                Until a Deal is done
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="period" id="" value="">
                            <label class="form-check-label" for="">
                                Other
                            </label>
                            <div class="flex">
                                <input type="number" class="form-control" placeholder="Please Specify" disabled>
                                <select name="" id="" class="form-select" disabled>
                                    <option value="">Week</option>
                                    <option value="">Month</option>
                                </select>
                            </div>
                        </div>
                    </div>

                    <h3>Message</h3>
                    <textarea name="description" id="" cols="30" rows="10" class="form-control"></textarea>
                    <div class="v-m center mt-3">
                        <button class="btn btn-primary" type="submit">Submit</button>
                    </div>
                </form>

                <!-- Estimated Cost Calculations -->
                <div class="costcalc">
                    <div class="card text-bg-info mb-3" style="max-width: 18rem; text-align:center;">
                        <div class="card-header">ESTIMATED COST</div>
                        <div class="card-body">
                            <h1 class="card-title d-inline">500</h1><h5 class="d-inline">$</h5>
                            <hr>
                            <h1 class="card-title d-inline">5,000,000</h1><h5 class="d-inline">L.L</h5>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </x-slot>

</x-user-layout>
