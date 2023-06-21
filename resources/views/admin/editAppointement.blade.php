<x-admin-layout>
    <x-slot name="main">
        <main class="container">
            <x-page-title title="appointment" subtitle="edit appointment #{{$appointement->id}}"></x-page-title>
            <hr>
            <x-messages msg="error_msg" type="danger"></x-messages>
            <x-messages msg="success_msg" type="success"></x-messages>
            <form action="{{ route('a-editAppointement', ['id' => $appointement->id]) }}" method="post">
                @csrf
                @method("PATCH")
                <div class="mb-3 row">
                    <label for="title" class="col-form-label col-sm-2">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Appointment Title" name="title" autocomplete="off" id="title" value="{{ $appointement->title }}">
                    </div>
                </div>
                @if($errors->has('title'))
                    <div class="error text-danger">* {{ ucfirst($errors->first('title')) }}</div>
                @endif

                <div class="mb-3 row">
                    <label for="notes" class="col-form-label col-sm-2">Notes</label>
                    <div class="col-sm-10">
                        <textarea placeholder="Additional Notes" name="notes" id="notes" cols="30" rows="10" class="form-control">{{ $appointement->notes }}</textarea>
                    </div>
                </div>
                @if($errors->has('notes'))
                    <div class="error text-danger">* {{ ucfirst($errors->first('notes')) }}</div>
                @endif


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
                @if($errors->has('property'))
                    <div class="error text-danger">* {{ ucfirst($errors->first('property')) }}</div>
                @endif

                <button type="submit" class="btn btn-primary">Update</button>
            </form>
        </main>
    </x-slot>

</x-admin-layout>
