<x-user-layout>

    <x-slot name="header">
        <x-header page="valuation"></x-header>
    </x-slot>

    <x-slot name="main">
        <section id="valuation" class="container">
            <h2 class="section-title flex-center">
                Fill in your details below to request a valuation from one of our specialities
            </h2>
            <form action="" method="post">
                <input type="text" class="form-control my-3 mx-1" placeholder="Full Name">
                <input type="text" class="form-control my-3 mx-1" placeholder="Email Address">
                <input type="text" class="form-control my-3 mx-1" placeholder="Telephone Number">
                <h2>Adress Details</h2>
                <div class="address grid">
                    <input type="text" class="form-control" name="" id="" placeholder="Address Line 1">
                    <input type="text" class="form-control" name="" id="" placeholder="Address Line 2">
                    <input type="text" class="form-control" name="" id="" placeholder="State">
                    <input type="text" class="form-control" name="" id="" placeholder="Postal/Zip Code">
                    <input type="text" class="form-control" name="" id="" placeholder="Town/City">
                </div>
                <h2 class="center">Property Details</h2>
                <h3>is this property for:</h3>
                <div class="for-options px-5">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="forradio" id="forsellradio">
                        <label class="form-check-label" for="forsellradio">
                            Sell
                        </label>
                    </div>

                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="forradio" id="forrentradio">
                        <label class="form-check-label" for="forrentradio">
                            Rent
                        </label>
                    </div>
                </div>


                <h3>is it: </h2>
                    <div class="furnishing-options px-5">
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="furnishradio" id="fullyfurnishedradio">
                            <label class="form-check-label" for="fullyfurnishedradio">
                                Fully Furnished
                            </label>
                        </div>

                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="furnishradio" id="partlyfurnishedradio">
                            <label class="form-check-label" for="partlyfurnishedradio">
                                Partly Furnished
                            </label>
                        </div>


                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="furnishradio" id="notfurnishedradio">
                            <label class="form-check-label" for="notfurnishedradio">
                                Not Furnished
                            </label>
                        </div>
                    </div>


                    <h3>number of bedrooms</h3>
                    <div class="center my-3">
                        <input type="number" name="bedrooms" id="bedrooms" class="form-control m-2" placeholder="Number of Bedrooms">
                    </div>

                    <h3>number of bathrooms</h3>
                    <div class="center my-3">
                        <input type="number" name="bedrooms" id="bedrooms" class="form-control m-2" placeholder="Number of Bathrooms">
                    </div>

                    <h3>Property Type</h3>
                    <select name="property-type" id="propertyType" class="form-select m-2">
                        <option value="appartement">Appartment</option>
                        <option value="villa">Villa</option>
                        <option value="chalet">Chalet</option>
                    </select>

                    <div class="garage my-2">
                        <label class="form-check-label" for="garage">Includes Garage</label>
                        <input type="checkbox" class="nav-link" id="garage" checked data-toggle="toggle">
                    </div>

                    <div class="v-m center mt-3">
                        <button class="btn btn-primary view-more" type="button">Submit</button>
                    </div>
            </form>
        </section>
    </x-slot>

</x-user-layout>
