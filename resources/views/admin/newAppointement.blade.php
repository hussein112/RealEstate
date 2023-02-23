<x-admin-layout>

    <x-slot name="main">
        <main class="admin-property container">
            <h4 class="title my-2 center">New Appointement</h4>
            <div class="container my-5">
                <hr>
                <x-messages msg="error_msg" type="danger"></x-messages>
                <x-messages msg="success_msg" type="success"></x-messages>
                <form action="{{ route('a-newAppointement') }}" method="post">
                    @csrf
                    <div class="mb-3 row">
                        <label for="title" class="col-form-label col-sm-2">Title</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Full Name" name="title" autocomplete="off" id="title">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="iname" class="col-form-label col-sm-2">Issuer Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" placeholder="Full Name" name="iname" autocomplete="off" id="iname">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="iphone" class="col-form-label col-sm-2">Issuer Phone</label>
                        <div class="col-sm-10">
                            <input autocomplete="off" id="iphone" class="form-control my-2" type="tel" name="iphone" placeholder="Phone Number">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="imsg" class="col-sm-2 col-form-label">Issuer Message</label>
                        <div class="col-sm-10">
                            <textarea name="imsg" id="imsg" cols="30" rows="10" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <select name="employee" id="">
                            <option value=""></option>
                        </select>
                    </div>
                    <div class="mb-3 row">
                        <select name="property" id="">
                            <option value=""></option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Add</button>
                </form>
            </div>
        </main>
    </x-slot>

</x-admin-layout>
