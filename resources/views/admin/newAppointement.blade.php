<x-admin-layout>

    <x-slot name="main">
        <main class="container">
            <x-page-title title="appointement" subtitle="TO-REMEMBER"></x-page-title>
            <hr>
            <x-messages msg="success_msg" type="success"></x-messages>
            <x-messages msg="error_msg" type="danger"></x-messages>
            <form action="{{ route('a-newAppointement') }}" method="post">
                @csrf
                <div class="mb-3 row">
                    <label for="title" class="col-form-label col-sm-2">Title</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Appointement Title" name="title" autocomplete="off" id="title">
                    </div>
                </div>

                <div class="mb-3 row">
                    <label for="notes" class="col-form-label col-sm-2">Notes</label>
                    <div class="col-sm-10">
                        <textarea placeholder="Additional Notes" name="notes" id="notes" cols="30" rows="10" class="form-control"></textarea>
                    </div>
                </div>

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

                <button type="submit" class="btn btn-primary">Add</button>
            </form>
        </main>
    </x-slot>

</x-admin-layout>
