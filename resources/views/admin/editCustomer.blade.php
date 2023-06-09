<x-admin-layout>
    <x-slot name="main">
        <main class="container">
            <x-page-title title="customer" subtitle="edit customer #{{ $customer->full_name }}"></x-page-title>
            <div class="container my-5">
                <x-messages msg="error_msg" type="danger"></x-messages>
                <x-messages msg="success_msg" type="success"></x-messages>
                <hr>
                <form action="{{ route('a-editCustomer', ['id' => $customer->id]) }}" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="mb-3 row">
                        <label for="fname" class="col-form-label col-sm-2">Full Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{ $customer->full_name }}" placeholder="Full Name" name="fullname" autocomplete="off" id="fname" maxlength="120">
                        </div>
                        @if($errors->has('fname'))
                            <div class="error text-danger">* {{ ucfirst($errors->first('fname')) }}</div>
                        @endif
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input autocomplete="off" value="{{ $customer->email }}" id="email" class="form-control" type="email" placeholder="Email" name="email" maxlength="70">
                        </div>
                        @if($errors->has('email'))
                            <div class="error text-danger">* {{ ucfirst($errors->first('email')) }}</div>
                        @endif
                    </div>

                    <div class="mb-3 row">
                        <label for="phone" class="col-form-label col-sm-2">Phone</label>
                        <div class="col-sm-10">
                            <input autocomplete="off" value="{{ $customer->phone }}" id="phone" class="form-control my-2" type="tel" name="phone" placeholder="Phone Number" pattern="^[0-9]+ [0-9]* [0-9]{3,}$">
                        </div>
                        @if($errors->has('phone'))
                            <div class="error text-danger">* {{ ucfirst($errors->first('phone')) }}</div>
                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </main>
    </x-slot>
</x-admin-layout>
