<x-employee.layout>
    <x-slot name="main">
        <main class="admins-admin container">
            <x-page-title title="properties" subtitle="All the properties listed on the system"></x-page-title>

            <x-messages msg="error_msg" type="danger"></x-messages>
            <x-messages msg="success_msg" type="success"></x-messages>
            <hr>
            <x-create-button target="e-newProperty" title="Property"></x-create-button>

            <table class="table table-bordered caption-top">
                <caption>List of All Properties</caption>
                <thead>
                <tr>
                    <th scope="col">
                        @sortablelink('id', "ID")
                    </th>
                    <th scope="col">
                        @sortablelink('size', "Size")
                    </th>
                    <th scope="col">
                        @sortablelink("title", "Title")
                    </th>
                    <th scope="col">
                        Description
                    </th>
                    <th scope="col">
                        @sortablelink("featured", "Featured")
                    </th>
                    <th scope="col">
                        @sortablelink("price", "Price")
                    </th>
                    <th scope="col">
                        @sortablelink("location", "Location")
                    </th>
                    <th scope="col">
                        @sortablelink("bedrooms_nb", "Bedrooms")
                    </th>
                    <th scope="col">
                        @sortablelink("bathrooms_nb", "Bathrooms")
                    </th>
                    <th scope="col">
                        @sortablelink("date_posted", "Date Posted")
                    </th>
                    <th scope="col">
                        @sortablelink("admin_id", "Posted By")
                    </th>
                    <th scope="col">
                        @sortablelink("type", "Type")
                    </th>
                    <th scope="col">
                        @sortablelink("customer_id", "Owner")
                    </th>
                    <th scope="col">
                        @sortablelink("for", "For")
                    </th>
                    <th scope="col">Details</th>
                    <th scope="col">Actions</th>
                </tr>
                </thead>
                @isset($properties)
                    <tbody>
                    @foreach($properties as $property)
                        <tr>
                            <th scope="row">{{ $property->id }}</th>
                            <td>{{ $property->size }}m<sup>2</sup></td>
                            <td>{{ $property->title }}</td>
                            <td class="td-long">{{ $property->description }}</td>
                            <td class="bg-success">
                                <iconify-icon icon="icon-park-solid:correct" style="color: white;"></iconify-icon>
                            </td>
                            <td>{{ $property->price }} $</td>
                            <td>{{ $property->location }}</td>
                            <td>{{ $property->bedrooms_nb }}</td>
                            <td>{{ $property->bathrooms_nb }}</td>
                            <td>{{ $property->created_at }}</td>
                            <td>{{ $property->addedBy->f_name . ' ' . $property->addedBy->l_name }}</td>
                            <td>{{ $property->type->type }}</td>
                            <td>{{ $property->owner->full_name }}</td>
                            <td>{{ $property->for }}</td>
                            <td><a href="{{ route("e-property", ['id' => $property->id]) }}" class="btn btn-primary flex-center"><iconify-icon icon="ic:sharp-remove-red-eye"></iconify-icon></a></td>
                            <td>
                                <a href="{{ route("e-editProperty", ['id' => $property->id]) }}" class="btn btn-primary">Edit</a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                @endisset
            </table>


            <!-- Start Pagination -->
            <div class="center">
                {{ $properties->links() }}
            </div>
            <!-- End Pagination -->

        </main>
    </x-slot>
</x-employee.layout>
