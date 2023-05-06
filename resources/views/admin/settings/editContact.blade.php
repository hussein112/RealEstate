<x-admin-layout>
    <x-slot name="main">
        <main class="container">
            <x-page-title title="contact" subtitle="give your audience your contact details"></x-page-title>
            <x-messages msg="error_msg" type="danger"></x-messages>
            <x-messages msg="success_msg" type="success"></x-messages>
            <hr>
            <form action="{{ route("edit-contact") }}" method="post" class="new-post" enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <input type="text" name="quote" class="form-control my-2" placeholder="Quote">
                <input type="email" name="email" class="form-control my-2" placeholder="Email">
                <input type="number" name="from" class="my-2">
                <input type="number" name="to" class="my-2">
                <button class="btn btn-primary my-2" type="submit">Update</button>
            </form>
        </main>
    </x-slot>
</x-admin-layout>
