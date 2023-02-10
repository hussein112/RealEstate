<x-admin-layout>
    <x-slot name="main">
        <main class="admin-property container">
            <h4 class="title my-2 center">Property <strong class="d-">#3245</strong> Details</h4>
            <div class="container my-5 d-flex flex-column flex-lg-row justify-content-around property-details">
                <hr>
                @isset($property)
                    <table class="table table-bordered w-100">
                        <tbody>
                        <tr>
                            <th>ID</th>
                            <td>{{ $property->id }}</td>
                        </tr>

                        <tr>
                            <th>Size</th>
                            <td>{{ $property->size }}</td>
                        </tr>

                        <tr>
                            <th>Title</th>
                            <td>{{ $property->title }}</td>
                        </tr>

                        <tr>
                            <th>Featured</th>
                            <td>{{ ($property->featured == 1) ? 'Yes' : 'No'}}</td>
                        </tr>

                        <tr>
                            <th>Price</th>
                            <td>{{ $property->price }}</td>
                        </tr>

                        <tr>
                            <th>Location</th>
                            <td>{{ $property->price }}</td>
                        </tr>

                        <tr>
                            <th>Bedrooms Number</th>
                            <td>{{ $property->bedrooms_nb }}</td>
                        </tr>

                        <tr>
                            <th>Bathroom Number</th>
                            <td>{{ $property->bathrooms_nb }}</td>
                        </tr>

                        <tr>
                            <th>Date Posted</th>
                            <td>{{ $property->date_posted }}</td>
                        </tr>

                        <tr>
                            <th>Posted By</th>
                            <td>{{ $property->addedBy->f_name . ' ' . $property->addedBy->l_name }}</td>
                        </tr>

                        <tr>
                            <th>Type</th>
                            <td>{{ $property->type->type }}</td>
                        </tr>

                        <tr>
                            <th>For</th>
                            <td>{{ $property->for }}</td>
                        </tr>

                        <tr>
                            <th>Owner</th>
                            <td>{{ $property->owner->full_name }}</td>
                        </tr>
                        </tbody>
                        <tfoot>
                        <th class="d-flex papers-btn">
                            <button class="btn btn-primary">Save CSV</button>
                            <button class="btn btn-primary">Save PDF</button>
                            <button class="btn btn-primary">Print</button>
                        </th>
                        </tfoot>
                    </table>
                @endisset


                <div class="right-side-wrapper w-100 m-1">
                    <div id="property1" class="carousel slide property-slides" data-bs-ride="true">
                        <div class="carousel-indicators">
                            <button type="button" data-bs-target="#property1" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#property1" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#property1" data-bs-slide-to="2" aria-label="Slide 3"></button>
                        </div>
                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="https://picsum.photos/200/300" class="d-block w-100" alt="..." loading="lazy">
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/200/300" class="d-block w-100" alt="..." loading="lazy">
                            </div>
                            <div class="carousel-item">
                                <img src="https://picsum.photos/200/300" class="d-block w-100" alt="..." loading="lazy">
                            </div>
                        </div>
                        <button class="carousel-control-prev" type="button" data-bs-target="#property1" data-bs-slide="prev">
                            <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Previous</span>
                        </button>
                        <button class="carousel-control-next" type="button" data-bs-target="#property1" data-bs-slide="next">
                            <span class="carousel-control-next-icon" aria-hidden="true"></span>
                            <span class="visually-hidden">Next</span>
                        </button>

                    </div>

                    <div class="features grid-text">
                        @if(sizeof($property->features) > 0)
                            @foreach($property->features as $feature)
                                <div class="feature">{{ $feature }}</div>
                            @endforeach
                        @else
                            <div class="feature">No Features</div>
                        @endif
                    </div>
                </div>
            </div>
        </main>
    </x-slot>

</x-admin-layout>
