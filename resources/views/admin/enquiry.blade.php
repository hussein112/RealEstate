<x-amdin-layout>

    <x-slot name="main">
        <main class="valuation-details container">
            <h4 class="title my-2">Enquiry #4343</h4>
            <div class="remainders">
                <div class="alert alert-danger">
                    <a href="#"><strong>Property #34234</strong></a>, Should be Valuated by Mon, 21/10/2000
                </div>
            </div>
            <div class="container">
                <hr>
                <table class="table mt-5">
                    <tbody class="table-group-divider">
                    @isset($enquiry)
                        <tr>
                            <th>ID</th>
                            <td>{{ $enquiry->id }}</td>
                        </tr>

                        <tr>
                            <th>Date Issued</th>
                            <td>{{ $enquiry->date_issued }}</td>
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
                    @endisset
                    </tbody>

                </table>
                <div class="property d-flex flex-column flex-lg-row">
                    <table class="table w-100 m-1">
                        <caption class="caption-top">Property Details</caption>
                        <tbody>

                            <tr>
                                <th>Postal Code</th>
                                <td>{{ $enquiry->purpose->postal_code }}</td>
                            </tr>

                            <tr>
                                <th>Furnishing Status</th>
                                <td>{{  }}</td>
                            </tr>

                            <tr>
                                <th>Includes Garage</th>
                                <td>{{  }}</td>
                            </tr>

                            <tr>
                                <th>Bedrooms Number</th>
                                <td>{{ $enquiry->purpose->bedrooms_nb }}</td>
                            </tr>

                            <tr>
                                <th>Bathrooms Number</th>
                                <td>{{ $enquiry->purpose->bathrooms_nb }}</td>
                            </tr>

                            <tr>
                                <th>Property Type</th>
                                <td>{{ $enquiry->purpose->type->type }}</td>
                            </tr>

                            <tr>
                                <th>Description</th>
                                <td>{{ $enquiry->purpose->description }}</td>
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
                            @isset($features)
                                @foreach($features as $feature)
                                    <div class="feature">{{ $feature }}</div>
                                @endforeach
                            @endisset
                        </div>
                    </div>

                </div>

            </div>

        </main>
    </x-slot>
</x-amdin-layout>
