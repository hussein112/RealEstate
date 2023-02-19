<x-admin-layout>
    <x-slot name="main">
        <main class="home-admin container">

            <x-page-title title="dashboard"></x-page-title>
            <hr>

            <h3 class="title">Overview</h3>
            <div class="mt-5 grid-3 admin-cards">
                @isset($valuations)
                    <div class="card">
                        <div class="card-body">
                            <iconify-icon class="card-image" icon="emojione-monotone:balance-scale"></iconify-icon>
                            <a href="{{ route('a-valuations') }}" class="card-title">Valuations</a>
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
                            <a href="{{ route('a-appointements') }}" class="card-title">Appointements</a>
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
                                <a href="{{ route('a-enquiries') }}" class="card-title">Enquries</a>
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
                            <a href="{{ route('a-properties') }}" class="card-title">Properties</a>
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
                                <a href="{{ route('a-users') }}" class="card-title">Users</a>
                                <p class="card-text">{{ $users }}</p>
                                @isset($latest_users)
                                    <div class="new flex-wrap flex-center">
                                        <span class="badge rounded-pill text-bg-danger">+ {{ $latest_users }}</span> <p>Last Week</p>
                                    </div>
                                @endisset
                            </div>
                        </div>
                @endisset


                <script src="https://cdn.jsdelivr.net/gh/hussein112/AdminNotes@1.0/admin-note.min.js" type="module"></script>
                <div id="an-notes">

                </div>
            </div>

            <div class="statistics admin-cards my-5">
                <h3 class="title">Statistics</h3>
                <div class="grid-4">
                    <div class="monthly-visitors">
                        <div class="card">
                            <div class="card-body">
                                <iconify-icon icon="fluent:people-audience-20-filled" class="card-image"></iconify-icon>
                                <div class="wrapper flex-center">
                                    <p class="card-text badge bg-success">10200</p>
                                    <a href="/admin/valuations.html" class="card-title">Visitors Monthly</a>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="monthly-marketing">
                        <div class="card">
                            <div class="card-body">
                                <iconify-icon icon="icon-park-solid:market-analysis" class="card-image"></iconify-icon>
                                <div class="wrapper flex-center">
                                    <p class="card-text badge bg-success">1200</p>
{{--                                    Avg Month = (Markerting for 1 year / 12months) / 12--}}
                                    <a href="/admin/valuations.html" class="card-title">Properties Marketed Monthly </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>


            <div class="charts grid-4">
                <div class="total-marketing chart-table">
                    <div class="options d-flex align-items-center justify-content-between">
                        <select name="" id="" class="form-select">
                            <option value="jan">Jan</option>
                        </select>
                        <div class="dropdown">
                            <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                ...
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Save PDF</a></li>
                                <li><a class="dropdown-item" href="#">Save CSV</a></li>
                                <li><a class="dropdown-item" href="#">Print</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="chart">
                        <canvas id="totalMarketing"></canvas>
                    </div>
                </div>

                <div class="top-properties chart-table">
                    <div class="options d-flex align-items-center justify-content-between">
                        <select name="" id="" class="form-select">
                            <option value="jan">Jan</option>
                        </select>

                        <div class="dropdown">
                            <button class="btn btn-success dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
                                ...
                            </button>
                            <ul class="dropdown-menu">
                                <li><a class="dropdown-item" href="#">Save PDF</a></li>
                                <li><a class="dropdown-item" href="#">Save CSV</a></li>
                                <li><a class="dropdown-item" href="#">Print</a></li>
                            </ul>
                        </div>
                    </div>

                    <div class="chart">
                        <canvas id="topProperties"></canvas>
                    </div>
                </div>
            </div>

        </main>
    </x-slot>
</x-admin-layout>
