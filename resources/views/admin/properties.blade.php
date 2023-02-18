<x-admin-layout>
    <x-slot name="main">
        <main class="admins-admin container">
            <h4 class="title my-2">Properties</h4>

            <div class="remainders">
                <div class="alert alert-danger">
                    <a href="#"><strong>Property #34234</strong></a>, Should be Valuated by Mon, 21/10/2000
                </div>
            </div>
            @if(session('success_msg') != null)
                <div class="container">
                    <strong class="bg-success text-light p-2 m-1">{{ session('success_msg') }}</strong>
                </div>
            @endif
            <hr>
            <x-create-button target="a-newProperty" title="Property"></x-create-button>

            <table class="table table-bordered caption-top">
                <caption>List of All Properties</caption>
                <thead class="bg-dark">
                <tr>
                    <th scope="col" class="text-primary">
                        <a href="#">ID</a>
                        <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>                    </a>
                    </th>
                    <th scope="col" class="text-primary">
                        <a href="#">Size</a>
                        <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                    </th>
                    <th scope="col" class="text-primary">
                        <a href="#">Title</a>
                        <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                    </th>
                    <th scope="col" class="text-primary">
                        <a href="#">Description</a>
                        <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                    </th>
                    <th scope="col" class="text-primary">
                        <a href="#">Featured</a>
                        <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                    </th>
                    <th scope="col" class="text-primary">
                        <a href="#">Price</a>
                        <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                    </th>
                    <th scope="col" class="text-primary">
                        <a href="#">Location</a>
                        <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                    </th>
                    <th scope="col" class="text-primary">
                        <a href="#"># Bedrooms</a>
                        <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                    </th>
                    <th scope="col" class="text-primary">
                        <a href="#"># Bathrooms</a>
                        <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                    </th>
                    <th scope="col" class="text-primary">
                        <a href="#">Date Posted</a>
                        <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                    </th>
                    <th scope="col" class="text-primary">
                        <a href="#">Posted By</a>
                        <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                    </th>
                    <th scope="col" class="text-primary">
                        <a href="#">Type</a>
                        <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                    </th>
                    <th scope="col" class="text-primary">
                        <a href="#">Owner</a>
                        <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
                    </th>
                    <th scope="col" class="text-primary">
                        <a href="#">for</a>
                        <a href="#" class="sort"><iconify-icon icon="uil:sort"></iconify-icon></a>
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
                                <button id="delete" id="{{ $property->id }}" class="btn btn-danger m-1" type="button" data-bs-toggle="modal" data-bs-target="#deleteModal{{$property->id}}">Delete</button>
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
                <x-delete-modal target="property" targetId="{{ $property->id }}">
                </x-delete-modal>
            @endforeach
            <!-- End Delete Modal -->

        </main>
    </x-slot>

</x-admin-layout>
