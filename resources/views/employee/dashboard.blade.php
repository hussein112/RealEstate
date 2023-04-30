<x-employee.layout>
    <x-slot name="main">
        <main class="home-employee container">
            <x-page-title title="dashboard"></x-page-title>
            <hr>
            <h3 class="title">Overview</h3>
            <div class="mt-5 grid-3 employee-cards">
                @isset($valuations)
                    <div class="card">
                        <div class="card-body">
                            <iconify-icon class="card-image" icon="emojione-monotone:balance-scale"></iconify-icon>
                            <a href="{{ route('e-valuations') }}" class="card-title">Valuations</a>
                            <p class="card-text">{{ $valuations }}</p>
                            @isset($latest_valuations)
                                <div class="new flex-wrap flex-center">
                                    <span class="badge rounded-pill text-bg-danger">+ {{ $latest_valuations }}</span> <p>Last Week</p>
                                </div>
                            @endisset
                        </div>
                    </div>
                @endisset

                @isset($appointements)
                    <div class="card">
                        <div class="card-body">
                            <iconify-icon class="card-image" icon="icon-park-solid:appointment"></iconify-icon>
                            <a href="{{ route('e-appointements') }}" class="card-title">Appointements</a>
                            <p class="card-text">{{ $appointements }}</p>
                            <div class="new flex-wrap flex-center">
                                <span class="badge rounded-pill text-bg-danger">+10</span> <p>Last Week</p>
                            </div>
                        </div>
                    </div>
                @endisset

                @isset($enquiries)
                    <div class="card">
                        <div class="card-body">
                            <iconify-icon class="card-image" icon="icon-park-outline:history-query"></iconify-icon>
                            <a href="{{ route('e-enquiries') }}" class="card-title">Enquries</a>
                            <p class="card-text">{{ $enquiries }}</p>
                            <div class="new flex-wrap flex-center">
                                <span class="badge rounded-pill text-bg-danger">+10</span> <p>Last Week</p>
                            </div>
                        </div>
                    </div>
                @endisset


                @isset($properties)
                    <div class="card">
                        <div class="card-body">
                            <iconify-icon class="card-image" icon="material-symbols:real-estate-agent"></iconify-icon>
                            <a href="{{ route('e-properties') }}" class="card-title">Properties</a>
                            <p class="card-text">{{ $properties }}</p>
                            @isset($latest_properties)
                                <div class="new flex-wrap flex-center">
                                    <span class="badge rounded-pill text-bg-danger">+ {{ $latest_properties }}</span> <p>Last Week</p>
                                </div>
                            @endisset
                        </div>
                    </div>
                @endisset

                @isset($users)
                    <div class="card">
                        <div class="card-body">
                            <iconify-icon class="card-image" icon="mdi:users-group"></iconify-icon>
                            <a href="{{ route('e-users') }}" class="card-title">Users</a>
                            <p class="card-text">{{ $users }}</p>
                            @isset($latest_users)
                                <div class="new flex-wrap flex-center">
                                    <span class="badge rounded-pill text-bg-danger">+ {{ $latest_users }}</span> <p>Last Week</p>
                                </div>
                            @endisset
                        </div>
                    </div>
                @endisset


                <script src="https://cdn.jsdelivr.net/gh/hussein112/AdminNotes@latest/admin-note.js" type="module"></script>
                <div id="an-notes">

                </div>
            </div>
        </main>
    </x-slot>
</x-employee.layout>
