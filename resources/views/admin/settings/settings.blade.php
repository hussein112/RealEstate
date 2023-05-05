<x-admin-layout>
    <x-slot name="main">
        <main class="users-admin container">
            <x-page-title title="settings" subtitle="edit your website"></x-page-title>
            <x-messages msg="error_msg" type="danger"></x-messages>
            <x-messages msg="success_msg" type="success"></x-messages>
            <hr>

            <div class="grid">
                <x-settings-card header="About Us Page" link="edit-about" body="ljalfldhalfhjsadfhl sadfasdf"></x-settings-card>
                <x-settings-card header="our services Page" link="edit-services" body="ljalfldhalfhjsadfhl sadfasdf"></x-settings-card>
                <x-settings-card header="privacy policy Page" link="edit-privacy" body="ljalfldhalfhjsadfhl sadfasdf"></x-settings-card>
                <x-settings-card header="terms & conditions Page" link="edit-terms" body="ljalfldhalfhjsadfhl sadfasdf"></x-settings-card>
            </div>
        </main>
    </x-slot>
</x-admin-layout>
