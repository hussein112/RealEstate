<x-admin-layout>
    <x-slot name="main">
        <main class="container">
            <x-page-title title="emails" subtitle="edit your emails template"></x-page-title>
            <x-messages msg="error_msg" type="danger"></x-messages>
            <x-messages msg="success_msg" type="success"></x-messages>
            <hr>
            <div class="grid">
                <div class="card email">
                    <div class="card-body">
                        <a href="{{ route("edit-email", ['email' => 'a-a']) }}" class="card-title display-3">Advertise Approved Email</a>
                    </div>
                </div>
                <div class="card email">
                    <div class="card-body">
                        <a href="{{ route("edit-email", ['email' => 'a-r']) }}" class="card-title display-3">Advertise Rejected Email</a>
                    </div>
                </div>

                <div class="card email">
                    <div class="card-body">
                        <a href="{{ route("edit-email", ['email' => 'v-a']) }}" class="card-title display-3">Valuation Approved Email</a>
                    </div>
                </div>

                <div class="card email">
                    <div class="card-body">
                        <a href="{{ route("edit-email", ['email' => 'v-r']) }}" class="card-title display-3">Valuation Rejected Email</a>
                    </div>
                </div>
            </div>
        </main>
    </x-slot>
</x-admin-layout>
