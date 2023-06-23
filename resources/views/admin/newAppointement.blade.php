<x-admin-layout>

    <x-slot name="main">
        <main class="container">
            <x-page-title title="appointment" subtitle="TO-REMEMBER"></x-page-title>
            <x-messages msg="success_msg" type="success"></x-messages>
            <x-messages msg="error_msg" type="danger"></x-messages>
            <hr>
            <form action="{{ route('a-newAppointement') }}" method="post">
                @csrf
                <div class="mb-3 row">
                    <label for="title" class="col-form-label col-sm-2">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Appointment Title" name="title" autocomplete="off" id="title" maxlength="90" required>
                    </div>
                </div>
                @if($errors->has('title'))
                    <div class="error text-danger">* {{$errors->first('title')}}</div>
                @endif

                <div class="mb-3 row">
                    <label for="notes" class="col-form-label col-sm-2">Notes</label>
                    <div class="col-sm-10">
                        <textarea placeholder="Additional Notes" name="notes" id="notes" cols="30" rows="5" class="form-control" maxlength="400" required></textarea>
                    </div>
                </div>
                @if($errors->has('notes'))
                    <div class="error text-danger">* {{$errors->first('notes')}}</div>
                @endif

                <div class="mb-3 row">
                    <label for="property" class="col-form-label col-sm-2">Property</label>
                    <div class="col-sm-10">
                        <select name="property" id="property" class="form-select">
                            @isset($properties)
                                <option selected disabled>--- Property -----</option>
                                @foreach($properties as $property)
                                    <option value="{{ $property->id }}">{{ $property->title }}</option>
                                @endforeach
                            @endisset
                        </select>
                    </div>
                </div>
                @if($errors->has('property'))
                    <div class="error text-danger">* {{$errors->first('property')}}</div>
                @endif

                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </main>
    </x-slot>

</x-admin-layout>
