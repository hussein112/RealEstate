<x-employee.layout>
    <x-slot name="main">
        <main class="valuation-details container">
            @isset($enquiry)
                <h4 class="title my-2">Enquiry #{{ $enquiry->id }}</h4>
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
                            <td>
                                <a href="mailto:{{$enquiry->issuer_email}}">{{ $enquiry->issuer_email }}</a>
                            </td>
                        </tr>

                        <tr>
                            <th>Issuer Phone</th>
                            <td>
                                <a href="tel:{{ $enquiry->issuer_phone }}">{{ $enquiry->issuer_phone }}</a>
                            </td>
                        </tr>

                        <tr>
                            <th>Issuer Message</th>
                            <td>{{ $enquiry->issuer_message }}</td>
                        </tr>

                        <tr>
                            <th>Property</th>
                            <td>
                                <a href="{{ route('e-property', ['id' => $enquiry->purpose->id]) }}">{{ $enquiry->purpose->title }}</a>
                            </td>
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
</x-employee.layout>
