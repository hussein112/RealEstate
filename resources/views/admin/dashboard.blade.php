<x-admin-layout>
    <x-slot name="main">
        <main class="home-admin container">

            <x-page-title title="dashboard" subtitle="overview of the system"></x-page-title>
            <hr>
            <div class="mt-5 grid-3 admin-cards">
                @isset($valuations)
                    <x-dashboard-card auth="a" icon="mingcute:balance-fill" title="valuations" :latest-count="$latest_valuations" :count="$valuations"></x-dashboard-card>
                @endisset

                @isset($appointements)
                        <x-dashboard-card auth="a" icon="mdi:book-schedule" title="appointements" :latest-count="$latest_appointements" :count="$appointements"></x-dashboard-card>
                @endisset

                @isset($enquiries)
                        <x-dashboard-card auth="a" icon="mdi:tooltip-question" title="enquiries" :latest-count="$latest_enquiries" :count="$enquiries"></x-dashboard-card>
                @endisset


                @isset($properties)
                        <x-dashboard-card auth="a" icon="material-symbols:home-work" title="properties" :latest-count="$latest_properties" :count="$properties"></x-dashboard-card>
                @endisset

                @isset($users)
                        <x-dashboard-card auth="a" icon="gridicons:multiple-users" title="users" :latest-count="$latest_users" :count="$users"></x-dashboard-card>
                @endisset


                <script src="https://cdn.jsdelivr.net/gh/hussein112/AdminNotes@latest/admin-note.js" type="module"></script>
                <div id="an-notes">

                </div>
            </div>
        </main>
    </x-slot>
</x-admin-layout>
