<div class="search">
    <div class="container">
        <form action="{{ route("propertiesSearch") }}" method="get" class="p-2 w-100">
            <!-- Basic Search -->
            <div class="basic-search d-flex flex-column flex-lg-row p-2">
                <div class="search-for flex flex-column flex-lg-row">
                    <label for="searchfor" class="form-label m-2">For</label>
                    <select name="dealtype" id="searchfor" class="form-select m-2">
                        @isset($fors)
                            @foreach($fors as $for)
                                <option value="{{ $for->for }}">{{ ucfirst($for->for) }}</option>
                            @endforeach
                        @endisset
                    </select>
                </div>

                <div class="location flex flex-column flex-lg-row">
                    <label for="location" class="form-label m-2">Where</label>
                    <select name="location" id="location" class="form-select m-2">
                        @isset($wheres)
                            @foreach($wheres as $where)
                                <option value="{{ $where->city }}">{{ ucfirst($where->city) }}</option>
                            @endforeach
                        @endisset
                    </select>
                </div>


                <div class="btns flex flex-wrap">
                    <button class="btn btn-danger m-2" type="button" data-bs-toggle="collapse" data-bs-target="#filters" aria-controls="filters" aria-expanded="false" aria-label="Toggle Advanced Search">
                        Filter
                    </button>
                    <button type="submit" class="btn btn-primary mx-2">Search</button>
                </div>
            </div>

            <!-- Advanced Search -->
            <div id="filters" class="advanced-search collapse p-2">
                <div class="flex flex-column flex-lg-row">
                    <div class="flex flex-column flex-lg-row">
                        <label for="propertyType" class="form-label m-2">Type</label>
                        <select name="propertyType" id="propertyType" class="form-select m-2">
                            @isset($types)
                                @foreach($types as $type)
                                    <option value="{{ $type->id }}">{{ $type->type }}</option>
                                @endforeach
                            @endisset
                        </select>
                    </div>
                    <div class="flex flex-column flex-lg-row">
                        <label for="minBedRooms" class="form-label m-2">Min Bedrooms</label>
                        <div class="range-wrap center">
                            <div class="range-value" id="rangeMin"></div>
                            <input type="range" name="minbedrooms" id="minBedRooms" class="form-range m-2"  value="1" min="1" max="30" step="1">
                        </div>
                    </div>
                    <div class="flex flex-column flex-lg-row m-2">
                        <label for="maxbedrooms" class="form-label m-2">Max Bedrooms</label>
                        <div class="range-wrap center">
                            <div class="range-value" id="rangeMax"></div>
                            <input type="range" name="maxbedrooms" id="maxbedrooms" class="form-range m-2" value="1" min="1" max="30" step="1">
                        </div>
                    </div>
                    <div class="flex flex-column flex-lg-row m-2">
                        <input type="number" name="minprice" id="minPrice" class="form-control m-2" placeholder="Min Price ($)" aria-label="Dollar amount (with dot and two decimal places)">
                    </div>
                    <div class="flex flex-column flex-lg-row m-2">
                        <input type="number" name="maxprice" id="maxPrice" class="form-control m-2" placeholder="Max Price ($)">
                    </div>
                </div>
            </div>

        </form>
    </div>
</div>
