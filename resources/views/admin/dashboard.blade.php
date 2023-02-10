<x-admin-layout>
    <x-slot name="main">
        <main class="home-admin container">
            <h4 class="title my-2">Dashboard</h4>
            <div class="remainders">
                <div class="alert alert-danger">
                    <a href="#"><strong>Property #34234</strong></a>, Should be Valuated by Mon, 21/10/2000
                </div>
            </div>
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



                <div class="drafts">
                    <div class="grid">
                        <div class="new-note">
                            <form action="">
                                <input type="text" name="" id="">
                                <input type="text" name="" id="">
                            </form>
                        </div>

                        <div class="pending">
                            <div class="accordion" id="accordionExample">
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingOne">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseOne" aria-expanded="false" aria-controls="collapseOne">
                                            Accordion Item #1
                                        </button>
                                    </h2>
                                    <div id="collapseOne" class="accordion-collapse collapse" aria-labelledby="headingOne" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <strong>This is the first item's accordion body.</strong> It is shown by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingTwo">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
                                            Accordion Item #2
                                        </button>
                                    </h2>
                                    <div id="collapseTwo" class="accordion-collapse collapse" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <strong>This is the second item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                                <div class="accordion-item">
                                    <h2 class="accordion-header" id="headingThree">
                                        <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                                            Accordion Item #3
                                        </button>
                                    </h2>
                                    <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                                        <div class="accordion-body">
                                            <strong>This is the third item's accordion body.</strong> It is hidden by default, until the collapse plugin adds the appropriate classes that we use to style each element. These classes control the overall appearance, as well as the showing and hiding via CSS transitions. You can modify any of this with custom CSS or overriding our default variables. It's also worth noting that just about any HTML can go within the <code>.accordion-body</code>, though the transition does limit overflow.
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
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
