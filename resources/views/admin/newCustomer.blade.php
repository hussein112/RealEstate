<x-admin-layout>
    <x-slot name="main">
        <main class="container">
            <x-page-title title="customer" subtitle="add new customer"></x-page-title>
            <div class="container my-5">
                <x-messages msg="success_msg" type="success"></x-messages>
                <x-messages msg="success_msg" type="success"></x-messages>
                <hr>
                <form action="{{ route('a-newCustomer') }}" method="post">
                @csrf
                <div class="mb-3 row">
                    <label for="fname" class="col-form-label col-sm-2">Full Name</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" placeholder="Full Name" name="fullname" autocomplete="off" id="fname">
                    </div>
                    @if($errors->has('fname'))
                        <div class="error text-danger">* {{ ucfirst($errors->first('fname')) }}</div>
                    @endif
                </div>
                <div class="mb-3 row">
                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                    <div class="col-sm-10">
                        <input autocomplete="off" id="email" class="form-control" type="email" placeholder="Email" name="email">
                    </div>
                    @if($errors->has('email'))
                        <div class="error text-danger">* {{ ucfirst($errors->first('email')) }}</div>
                    @endif
                </div>

                <div class="mb-3 row">
                    <div class="d-flex align-items-center">
                        <iconify-icon class="display-4" icon="twemoji:flag-lebanon"></iconify-icon>
                        <input type="text" name="phone" id="phone" class="form-control w-auto mx-2" placeholder="03 123 456" required>
                    </div>
                    @if($errors->has('phone'))
                        <div class="error text-danger">* {{ ucfirst($errors->first('phone')) }}</div>
                    @endif
                </div>
                <button type="submit" class="btn btn-primary">Add</button>
            </form>
                </div>
        </main>
    </x-slot>
</x-admin-layout>
