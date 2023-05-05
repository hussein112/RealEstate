<x-admin-layout>
    <x-slot name="main">
        <main class="users-admin container">
            <x-page-title title="about" subtitle="About us page is the mirror of your company, write it carefully!"></x-page-title>
            <x-messages msg="error_msg" type="danger"></x-messages>
            <x-messages msg="success_msg" type="success"></x-messages>
            <hr>

            <div class="card">
                <div class="card-header">
                    <!-- Add The Company Logo -->
                    About Us Page
                </div>
                <div class="card-body">
                    <h5 class="card-title">Edit About Us Page</h5>
                    <p class="card-text">Bla, Bla, Bla,</p>
                    <a href="#" class="btn btn-primary">Edit</a>
                </div>
            </div>
        </main>
    </x-slot>
</x-admin-layout>
