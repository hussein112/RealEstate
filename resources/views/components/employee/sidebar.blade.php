<!-- Start Sidebar -->
@php($employee = App\Models\Employee::find(Auth::guard('employee')->id()))
<div class="sidebar-wrapper collapse collapse-horizontal" id="sidebar">
    <aside class="d-flex flex-column flex-shrink-0 p-3">
        <ul class="nav nav-pills mb-auto">
            <br>
            <div class="notifications admin-notifications flex-center">
                <!-- Start Notifications List -->
                <button class="btn btn-primary position-relative" type="button" data-bs-toggle="offcanvas" data-bs-target="#notifications" aria-controls="notifications">
                    <iconify-icon class="display-6" icon="ion:notifications-sharp"></iconify-icon>
                    @if(auth()->user()->unreadNotifications()->count() > 0)
                        <span class="position-absolute top-0 start-10 translate-middle badge rounded-pill bg-danger">
                            {{ auth()->user()->unreadNotifications()->count() }}
                        <span class="visually-hidden">Unread Notifications</span>
                    </span>
                    @endif

                </button>
                <div class="offcanvas offcanvas-start" tabindex="-1" id="notifications" aria-labelledby="notifications">
                    <div class="offcanvas-header">
                        <h3 class="offcanvas-title" id="notifications">Notifications</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="notifications-btns flex-center">
                        <form action="{{ route("e-deleteNotifications") }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-link">Delete All</button>
                        </form>
                        <form action="{{ route("e-readNotifications") }}" method="POST">
                            @csrf
                            <button class="btn btn-link">Mark All As Read</button>
                        </form>
                    </div>
                    <hr>

                    <div class="offcanvas-body">
                        <div>
                            <!-- Start Notification -->
                            <div class="list-group">
                                @if(! empty(auth()->user()->notifications))
                                    @foreach(auth()->user()->unreadNotifications as $notification)
                                        <a href="" class="my-1 list-group-item list-group-item-action list-group-item-primary" aria-current="true">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">{{ $notification->data['message'] }}
                                                    <span class="position-absolute top-0 start-100 translate-middle p-2 bg-warning border border-light rounded-circle">
                                                        <span class="visually-hidden">New alerts</span>
                                                     </span>
                                                </h5>
                                                <small> {{ Carbon\Carbon::parse($notification->created_at)->diffForHumans(Carbon\Carbon::now()) }} </small>
                                            </div>
                                        </a>
                                    @endforeach

                                    @foreach(auth()->user()->readNotifications as $notification)
                                        <div class="list-group-item list-group-item-action text-muted" aria-current="true">
                                            <div class="d-flex w-100 justify-content-between">
                                                <h5 class="mb-1">{{ $notification->data['message'] }}</h5>
                                                <small> {{ Carbon\Carbon::parse($notification->created_at)->diffForHumans(Carbon\Carbon::now()) }} </small>
                                            </div>
                                        </div>
                                    @endforeach

                                @else
                                    <p>No Notifications</p>
                                @endif

                            </div>
                            <!-- End Notification -->
                        </div>
                    </div>
                </div>
                <!-- End Notifications List -->
            </div>
            <br>
            <li class="nav-item">
                <a href="{{ route("e-dashboard") }}" class="nav-link {{ ( request()->is('employee') || request()->is('employee/dashboard')) ? 'active' : '' }}">
                    Home
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("e-posts") }}" class="nav-link  {{ ( request()->is('employee/posts') || request()->is('employee/*/employee/*')) ? 'active' : '' }}">
                    Blog
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("e-properties") }}" class="nav-link {{ ( request()->is('employee/properties') || request()->is('employee/*/property/*')) ? 'active' : '' }}">
                    Properties
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("e-users") }}" class="nav-link {{ ( request()->is('employee/users') || request()->is('employee/*/user/*')) ? 'active' : '' }}">
                    Users
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("e-customers") }}" class="nav-link {{ ( request()->is('employee/customers') || request()->is('employee/*/customers/*')) ? 'active' : '' }}">
                    Customers
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("e-valuations") }}" class="nav-link {{ ( request()->is('employee/valuations') || request()->is('employee/valuation/*')) ? 'active' : '' }}">
                    Valuations
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("e-appointements") }}" class="nav-link {{ ( request()->is('employee/appointements') || request()->is('employee/*/appointement/*')) ? 'active' : '' }}">
                    Appointements
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("e-enquiries") }}" class="nav-link {{ ( request()->is('emloyee/enquiries') || request()->is('*/enquiry/*')) ? 'active' : '' }}">
                    Enquiries
                </a>
            </li>

            <div class="d-flex flex-column my-2">
                <li class="nav-item colors mx-2">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="theme">
                        <label class="form-check-label" for="theme">Color</label>
                    </div>
                </li>
                <li class="nav-item lang mx-2">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="language">
                        <label class="form-check-label" for="language">Language</label>
                    </div>
                </li>
            </div>
        </ul>
        <hr>
        <div class="dropdown">
            <a href="#" class="d-flex align-items-center  text-decoration-none dropdown-toggle" id="dropdownUser2" data-bs-toggle="dropdown" aria-expanded="false">
                <img src="{{ asset('storage/' . $employee->avatar->image) }}" alt="Avatar" width="32" height="32" class="rounded-circle me-2">
                <strong class="auth-name">{{ $employee->full_name }}</strong>
            </a>
            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                <li><a class="dropdown-item" href="{{ route('e-profileShow', ['id' => Auth::guard('employee')->id()]) }}">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item">
                        <form action="{{ route('e-logout', ['id' => Auth::guard('employee')->id()]) }}" method="post">
                            @csrf
                            <button type="submit" class="dropdown-item">Log Out</button>
                        </form>
                    </a>
                </li>

            </ul>
        </div>
    </aside>
</div>
<!-- End Sidebar -->
