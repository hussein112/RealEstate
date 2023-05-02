<x-employee.layout>
    <x-slot name="main">
        <main class="container">
            <x-page-title title="customer" subtitle="edit customer #{{ $customer->full_name }}"></x-page-title>
            <div class="container my-5">
                @if($errors->any())
                    @foreach($errors->all() as $error)
                        <strong class="bg-danger">{{ $error }}</strong>
                    @endforeach
                @else
                    @if(session('success_msg') != null)
                        <strong class="bg-success">{{ session('success_msg') }}</strong>
                    @endif
                @endif
                <hr>
                <form action="{{ route('e-editCustomer', ['id' => $customer->id]) }}" method="post">
                    @method('PATCH')
                    @csrf
                    <div class="mb-3 row">
                        <label for="fname" class="col-form-label col-sm-2">Full Name</label>
                        <div class="col-sm-10">
                            <input type="text" class="form-control" value="{{ $customer->full_name }}" placeholder="Full Name" name="fullname" autocomplete="off" id="fname">
                        </div>
                    </div>
                    <div class="mb-3 row">
                        <label for="email" class="col-sm-2 col-form-label">Email</label>
                        <div class="col-sm-10">
                            <input autocomplete="off" value="{{ $customer->email }}" id="email" class="form-control" type="email" placeholder="Email" name="email">
                        </div>
                    </div>

                    <div class="mb-3 row">
                        <label for="phone" class="col-form-label col-sm-2">Phone</label>
                        <div class="col-sm-10">
                            <input autocomplete="off" value={{ $customer->phone }} id="phone" class="form-control my-2" type="tel" name="phone" placeholder="Phone Number">
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </main>
    </x-slot>
</x-employee.layout>
