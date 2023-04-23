<x-admin-layout>
    <x-slot name="main">
        <main class="admins-admin container">
            <x-page-title title="properties"></x-page-title>

            <x-messages msg="error_msg" type="danger"></x-messages>
            <x-messages msg="success_msg" type="success"></x-messages>
            <hr>
            <x-create-button target="a-newProperty" title="Property"></x-create-button>

            <table class="table table-bordered caption-top">
                <caption>List of All Properties</caption>
                <thead class="bg-dark">
                <tr>
                    <th scope="col" class="text-primary">
                        @sortablelink('id', 'ID')
                    </th>
                    <th scope="col" class="text-primary">
                        @sortablelink('size', 'Size')
                    </th>
                    <th scope="col" class="text-primary">
                        @sortablelink('title', 'Title')
                    </th>
                    <th scope="col" class="text-primary">
                        @sortablelink('description', "Description")
                    </th>
                    <th scope="col" class="text-primary">
                        @sortablelink('featured', 'Featured')
                    </th>
                    <th scope="col" class="text-primary">
                        @sortablelink("price", "Price")
                    </th>
                    <th scope="col" class="text-primary">
                        @sortablelink("location", "Location")
                    </th>
                    <th scope="col" class="text-primary">
                        @sortablelink("bedrooms_nb", "Bedrooms")
                    </th>
                    <th scope="col" class="text-primary">
                        @sortablelink('bathrooms_nb', 'Bathrooms')
                    </th>
                    <th scope="col" class="text-primary">
                        @sortablelink("date_posted", "Date Posted")
                    </th>
                    <th scope="col" class="text-primary">
                        @sortablelink("admin_id", "Posted By")
                    </th>
                    <th scope="col" class="text-primary">
                        @sortablelink("type_id", "Type")
                    </th>
                    <th scope="col" class="text-primary">
                        @sortablelink("customer_id", "Owner")
                    </th>
                    <th scope="col" class="text-primary">
                        @sortablelink("for", "For")
                    </th>
                    <th scope="col" class="text-primary">Actions</th>
                    <th scope="col" class="text-primary">Details</th>
                </tr>
                </thead>
                @isset($properties)
                <tbody>
                    @foreach($properties as $property)
                        <tr>
                            <th scope="row">{{ $property->id }}</th>
                            <td>{{$property->size}}m<sup>2</sup></td>
                            <td>{{ $property->title }}</td>
                            <td class="td-long">{{ $property->description }}</td>
                            @if($property->featured == 1)
                                <td class="bg-primary">
                                    <iconify-icon icon="icon-park-solid:correct" style="color: white;"></iconify-icon>
                                </td>
                            @else
                                <td class="bg-warning">
                                    <iconify-icon icon="ph:x-bold" style="color: white;"></iconify-icon>
                                </td>
                            @endif
                            <td>{{ $property->price }} $</td>
                            <td>{{ $property->location }}</td>
                            <td>{{ $property->bedrooms_nb }}</td>
                            <td>{{ $property->bathrooms_nb }}</td>
                            <td>{{ $property->date_posted }}</td>
                            <td>{{ isset($property->addedBy->f_name) ? $property->addedBy->f_name . '  ' . $property->addedBy->l_name : "no admin!"}}</td>
                            <td>{{ ($property->type->type) ?? "no type" }}</td>
                            <td>{{ ($property->owner->full_name) ?? 'no owner' }}</td>
                            <td>{{ $property->for }}</td>
                            <td class="action-btns">
                                <a href="{{ route("a-editProperty", ['id' => $property->id]) }}" class="btn btn-primary m-1">Edit</a>
                                <button class="btn btn-danger m-1" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal{{$property->id}}">Delete</button>
                            </td>
                            <td><a href="{{ route("a-property", ['id' => $property->id]) }}" class="btn btn-primary">></a></td>
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


            <!-- Start Delete Modal -->
            @foreach($properties as $property)
                <x-delete-modal target="property" targetId="{{ $property->id }}" auth="a">
                </x-delete-modal>
            @endforeach
            <!-- End Delete Modal -->

        </main>
    </x-slot>

</x-admin-layout>
