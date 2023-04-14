<x-admin-layout>
    <x-slot name="main">
        <main class="valuation-details container">
            @isset($valuation)
                <h4 class="title my-2">Valuation #{{ $valuation->id }}</h4>
                <div class="remainders">
                    <div class="alert alert-danger">
                        <a href="#"><strong>Property #34234</strong></a>, Should be Valuated by Mon, 21/10/2000
                    </div>
                </div>
                <div class="container">
                    <hr>
                    <table class="table mt-5">
                        <tbody class="table-group-divider">
                        <tr>
                            <th>ID</th>
                            <td>{{ $valuation->id }}</td>
                        </tr>

                        <tr>
                            <th>Date Issued</th>
                            <td>{{ $valuation->date_issued }}</td>
                        </tr>

                        <tr>
                            <th class="bg-danger">Valuation Status</th>
                            <td class="bg-danger text-light">{{ ($valuation->valuation_status == 0) ? "Pending" : "Finished" }}</td>
                        </tr>

                        <tr>
                            <th>Issuer Name</th>
                            <td>{{ $valuation->full_name }}</td>
                        </tr>

                        <tr>
                            <th>Issuer Email</th>
                            <td><a href="mailto:{{ $valuation->issuer_email }}">{{ $valuation->issuer_email }}</a></td>
                        </tr>

                        <tr>
                            <th>Issuer Phone</th>
                            <td><a href="tel:+{{ $valuation->issuer_phone }}">{{ $valuation->issuer_phone }}</a></td>
                        </tr>

                        <tr>
                            <th>Address 1</th>
                            <td>{{ $valuation->address_one }}</td>
                        </tr>

                        <tr>
                            <th>Address 2</th>
                            <td>{{ ($valuation->address_two) ?? "-" }}</td>
                        </tr>

                        <tr>
                            <th>City</th>
                            <td>{{ $valuation->city }}</td>
                        </tr>

                        <tr>
                            <th>Postal Code</th>
                            <td>{{ $valuation->postal_code }}</td>
                        </tr>

                        <tr>
                            <th>Furnishing Status</th>
                            @php
                                $furnishing = '';
                                switch($valuation->furnishing_status){
                                    case 0:
                                        $furnishing = "Not Furnished";
                                        break;
                                    case 1:
                                        $furnishing = "Partially Furnished";
                                        break;
                                    default:
                                        $furnishing = "Fully Furnished";
                                }
                            @endphp
                            <td>{{ $furnishing }}</td>
                        </tr>

                        <tr>
                            <th>Includes Garage</th>
                            <td>{{ ($valuation->garage == 0) ? "No" : "Yes" }}</td>
                        </tr>

                        <tr>
                            <th>Bedrooms Number</th>
                            <td>{{ $valuation->bedrooms_nb }}</td>
                        </tr>

                        <tr>
                            <th>Bathrooms Number</th>
                            <td>{{ $valuation->bathrooms_nb }}</td>
                        </tr>

                        <tr>
                            <th>Property Type</th>
                            <td>{{ ($valuation->type == 1) ? "Sell" : "Rent" }}</td>
                        </tr>

                        <tr>
                            <th>Description</th>
                            <td>{{ $valuation->description }}</td>
                        </tr>
                        </tbody>
                        <tfoot class="d-flex papers-specific">
                        <td><button class="btn btn-primary">Save CSV</button></td>
                        <td><button class="btn btn-primary">Save PDF</button></td>
                        <td><button class="btn btn-primary">Print</button></td>
                        </tfoot>
                    </table>

                </div>
            @endisset
        </main>
    </x-slot>
</x-admin-layout>