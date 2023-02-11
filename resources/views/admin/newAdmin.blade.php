<x-admin-layout>
    <x-slot name="main">
        <main class="admin-property container">
            <h4 class="title my-2 center">Add New Admin</h4>
            <div class="container my-5">
                <hr>
                <x-session-messages></x-session-messages>
                <form action="{{ route('a-newAdmin') }}" method="post">
                    @csrf
                    <input class="form-control my-2" type="text" placeholder="First Name" name="fname" required>
                    <input class="form-control my-2" type="text" placeholder="Middle Name" name="mname" required>
                    <input class="form-control my-2" type="text" placeholder="Last Name" name="lname" required>
                    <div class="input-group mb-3">
                        <input type="password" class="form-control" id="password" placeholder="Password" name="password" aria-label="Password" aria-describedby="showpass" required>
                        <span class="input-group-text" id="showpass">
                        <iconify-icon icon="bx:hide" id="passicon"></iconify-icon>
                    </span>
                    </div>
                    <input class="form-control my-2" name="email" type="email" placeholder="Email" required>
                    <input class="form-control my-2" type="tel" placeholder="Phone Number" name="phone" required>
                    <button type="submit" class="btn btn-success">Add</button>
                </form>
            </div>
        </main>
    </x-slot>

</x-admin-layout>
