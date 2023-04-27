<x-admin-layout>
    <x-slot name="main">
        <main class="valuation-details container">
            <x-page-title title="Enquiry #{{$enquiry->id}}"></x-page-title>
            <div class="container">
                <hr>
                <table class="table mt-5">
                    <tbody class="table-group-divider">
                        <tr>
                            <th>ID</th>
                            <td>{{ $enquiry->id }}</td>
                        </tr>

                        <tr>
                            <th>Date Issued</th>
                            <td>{{ $enquiry->created_at }}</td>
                        </tr>

                        <tr>
                            <th>Issuer Name</th>
                            <td>{{ $enquiry->issuer_name }}</td>
                        </tr>

                        <tr>
                            <th>Issuer Email</th>
                            <td><a href="mailto:{{ $enquiry->issuer_email }}">{{ $enquiry->issuer_email }}</a></td>
                        </tr>

                        <tr>
                            <th>Issuer Phone</th>
                            <td><a href="tel:+{{ $enquiry->issuer_phone }}">{{ $enquiry->issuer_phone }}</a></td>
                        </tr>


                        <tr>
                            <th>Furnishing Status</th>
                            <td>
                                @switch($enquiry->furnishing_status)
                                    @case(2)
                                        Fully Furnished
                                    @break
                                    @case(1)
                                        Partly Furnished
                                    @break
                                    @case(0)
                                         Not Furnished
                                    @break
                                    @default
                                        -
                                @endswitch
                            </td>
                        </tr>
                    </tbody>

                </table>
                <div class="property d-flex flex-column flex-lg-row">
                    <table class="table w-100 m-1">
                        <caption class="caption-top">Property Details</caption>
                        <tbody>
                        @php($property = $enquiry->purpose)

                        <tr>
                            <th>For</th>
                            <td>{{ $property->for }}</td>
                        </tr>

                        <tr>
                            <th>Featured</th>
                            <td>{{ ($property->featured == 1) ? "Yes" : "No" }}</td>
                        </tr>

                        <tr>
                            <th>Price</th>
                            <td>{{ $property->price }}</td>
                        </tr>

                        <tr>
                            <th>Location</th>
                            <td>{{ $property->city }}</td>
                        </tr>

                        <tr>
                            <th>Added By</th>
                            <td>{{ $property->addedBy->f_name . ' ' . $property->addedBy->l_name }}</td>
                        </tr>

                        <tr>
                            <th>Customer</th>
                            <td>{{ $property->owner->full_name }}</td>
                        </tr>

                        <tr>
                            <th>Includes Garage</th>
                            <td>{{ ($property->garage == 0) ? "Yes" : "No" }}</td>
                        </tr>

                        <tr>
                            <th>Bedrooms Number</th>
                            <td>{{ $property->bedrooms_nb }}</td>
                        </tr>

                        <tr>
                            <th>Bathrooms Number</th>
                            <td>{{ $property->bathrooms_nb }}</td>
                        </tr>

                        <tr>
                            <th>Property Type</th>
                            <td>{{ $property->type->type }}</td>
                        </tr>

                        <tr>
                            <th>Description</th>
                            <td>{{ $property->description }}</td>
                        </tr>
                        </tbody>
                        <tfoot class="d-flex papers-specific">
                        <td><button class="btn btn-primary">Save CSV</button></td>
                        <td><button class="btn btn-primary">Save PDF</button></td>
                        <td><button class="btn btn-primary">Print</button></td>
                        </tfoot>
                    </table>

                    <div class="w-100 m-1">
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
                            @if(sizeof($property->features) > 1)
                                @foreach($property->features as $feature)
                                    <div class="feature">{{ $feature->feature }}</div>
                                @endforeach
                            @else
                                <div class="feature">No Features</div>
                            @endif
                        </div>
                    </div>

                </div>

            </div>
        </main>
    </x-slot>
</x-admin-layout>
