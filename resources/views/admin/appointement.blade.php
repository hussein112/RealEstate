<x-admin-layout>
    <x-slot name="main">
        <main class="valuation-details container">
            <h4 class="title my-2">Appointement #4343</h4>
            <div class="remainders">
                <div class="alert alert-danger">
                    <a href="#"><strong>Property #34234</strong></a>, Should be Valuated by Mon, 21/10/2000
                </div>
            </div>
            <div class="container">
                <hr>
                <table class="table mt-5">
                    <tbody class="table-group-divider">
                    @isset($appointement)
                        <tr>
                            <th>ID</th>
                            <td>{{ $appointement->id }}</td>
                        </tr>

                        <tr>
                            <th>Title</th>
                            <td>{{ $appointement->title }}</td>
                        </tr>


                        <tr>
                            <th>Due</th>
                            <td>{{ $appointement->date }}</td>
                        </tr>

                        <tr>
                            <th>Issuer</th>
                            <td>{{ $appointement->issuer_name }}</td>
                        </tr>

                        <tr>
                            <th>Issuer Message</th>
                            <td>{{ $appointement->issuer_message }}</td>
                        </tr>

                        <tr>
                            <th>Issuer Phone</th>
                            <td><a href="tel:+{{$appointement->issuer_phone}}">{{$appointement->issuer_phone}}</a></td>
                        </tr>

                        <tr>
                            <th>Planned By</th>
                            <td>{{ $appointement->addedBy->f_name }}</td>
                        </tr>

                        <tr>
                            <th>Assigned To</th>
                            <td>{{ $appointement->assignedTo->f_name }}</td>
                        </tr>
                    @endisset
                    </tbody>
                    <tfoot class="d-flex papers-specific">
                    <td><button class="btn btn-primary">Save CSV</button></td>
                    <td><button class="btn btn-primary">Save PDF</button></td>
                    <td><button class="btn btn-primary">Print</button></td>
                    </tfoot>
                </table>

            </div>
        </main>
    </x-slot>
</x-admin-layout>
