<x-admin-layout>
    <x-slot name="main">
        <main class="users-admin container">
            <x-page-title title="settings" subtitle="edit your website"></x-page-title>
            <x-messages msg="error_msg" type="danger"></x-messages>
            <x-messages msg="success_msg" type="success"></x-messages>
            <hr>

            <div class="grid">
                <x-settings-card header="About Us Page" link="edit-about" body="Company CV"></x-settings-card>
                <x-settings-card header="our services Page" link="edit-services" body="list of company services"></x-settings-card>
                <x-settings-card header="privacy policy Page" link="edit-privacy" body="data collection policy"></x-settings-card>
                <x-settings-card header="terms & conditions Page" link="edit-terms" body="general rules to use website"></x-settings-card>
                <x-settings-card header="Advertising Rules" link="edit-advertise" body="rules before making deals"></x-settings-card>
                <x-settings-card header="contact details" link="edit-contact" body="Email & Phone"></x-settings-card>
                <x-settings-card header="email templates" link="edit-emails" body="email message settings/styling"></x-settings-card>
            </div>

            <hr>

            <div class="employee-capacity">
                <h2>Employee Capacity</h2>
                <p class="lead">
                    Lorem ipsum dolor sit amet, consectetur adipisicing elit. Accusantium aliquam autem debitis distinctio dolor dolorum ea fugit iste iure laudantium necessitatibus nemo placeat quae quia, quo quod similique voluptas. Assumenda?
                </p>
                <form action="{{ route("a-updateEmployeeCapacity") }}" method="POST">
                    @csrf
                    @method("PATCH")
                    <div class="form-floating mb-3">
                        <input type="number" name="capacity" class="form-control" value="{{ App\Custom\EmployeeCapacity::getEmployeeCapacity() }}">
                        <label for="ec">Employee Capacity</label>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

            <div class="property">
                <div class="max-images">
                    <h2>Max images per property</h2>
                    <form action="{{ route("a-updatePropertyMaxImages") }}" method="POST">
                        @csrf
                        @method("PATCH")
                        <div class="form-floating mb-3">
                            <input type="number" name="max" class="form-control" value="{{ App\Custom\MaxImagesPerProperty::getMax() }}">
                            <label for="ec">Max Images/Property</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>

                <div class="max-features">
                    <h2>Max Features per property</h2>
                    <form action="{{ route("a-updatePropertyMaxFeatures") }}" method="POST">
                        @csrf
                        @method("PATCH")
                        <div class="form-floating mb-3">
                            <input type="number" name="max" class="form-control" value="{{ App\Custom\MaxFeaturesPerProperty::getMax() }}">
                            <label for="ec">Max Features/Property</label>
                        </div>
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </form>
                </div>
            </div>
        </main>
    </x-slot>
</x-admin-layout>
