<x-employee.layout>

    <x-slot name="main">
        <main class="admin-property container">
            <x-page-title title="appointement" subtitle="edit appointement #{{$appointement->title}}"></x-page-title>
            <hr>
            <x-messages msg="error_msg" type="danger"></x-messages>
            <x-messages msg="success_msg" type="success"></x-messages>
            <form action="{{ route('e-editAppointement', ['id' => $appointement->id]) }}" method="post">
                @csrf
                @method("PATCH")
                <div class="mb-3 row">
                    <label for="title" class="col-form-label col-sm-2">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Appointement Title" name="title" autocomplete="off" id="title" value="{{ $appointement->title }}">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="notes" class="col-form-label col-sm-2">Notes</label>
                    <div class="col-sm-10">
                        <textarea placeholder="Additional Notes" name="notes" id="notes" cols="30" rows="10" class="form-control">{{ $appointement->notes }}</textarea>
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="property" class="col-form-label col-sm-2">Purpose</label>
                    <div class="col-sm-10">
                        <select name="property" id="property" class="form-select">
                            @isset($properties)
                                @foreach($properties as $property)
                                    <option value="{{ $property->id }}" @selected($property->id == $appointement->property_id)>{{ $property->title }}</option>
                                @endforeach
                            @endisset
                        </select>
                    </div>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </main>
    </x-slot>

</x-employee.layout>
