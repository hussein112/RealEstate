<!-- Start Sidebar -->
@php($admin = App\Models\Admin::find(Auth::guard('admin')->id()))
<div class="sidebar-wrapper collapse collapse-horizontal" id="sidebar">
    <aside class="d-flex flex-column flex-shrink-0 p-3">
        <ul class="nav nav-pills mb-auto">
            <br>
            <div class="notifications admin-notifications flex-center">
                <!-- Start Notifications List -->
                <button class="btn btn-primary" type="button" data-bs-toggle="offcanvas" data-bs-target="#notifications" aria-controls="notifications">
                    <iconify-icon icon="ion:notifications-sharp"></iconify-icon>
                </button>

                <div class="offcanvas offcanvas-start" tabindex="-1" id="notifications" aria-labelledby="notifications">
                    <div class="offcanvas-header">
                        <h3 class="offcanvas-title" id="notifications">Notifications</h3>
                        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close"></button>
                    </div>
                    <div class="notifications-btns container">
                        <a href="#" class="link-primary">Clear All</a>
                        <a href="#" class="link-primary">Mark as Read</a>
                        <hr>
                    </div>
                    <div class="offcanvas-body">
                        <div>
                            <!-- Start Notification -->
                            <div class="list-group">
                                <a href="#" class="list-group-item list-group-item-action active" aria-current="true">
                                    <div class="d-flex w-100 justify-content-between">
                                        <h5 class="mb-1">Notification 1</h5>
                                        <small>5 Seconds Ago</small>
                                    </div>
                                    <p class="mb-1">A new valuation request was added.</p>
                                </a>
                            </div>
                            <!-- End Notification -->
                        </div>
                    </div>
                </div>
                <!-- End Notifications List -->
            </div>

            <br>
            <li class="nav-item">
                <a href="{{ route("a-dashboard") }}" class="nav-link {{ ( request()->is('admin') || request()->is('admin/dashboard')) ? 'active' : '' }}">
                    Home
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("a-admins") }}" class="nav-link  {{ ( request()->is('admin/admins') || request()->is('admin/*/admin/*')) ? 'active' : '' }}">
                    Admins
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("a-posts") }}" class="nav-link  {{ ( request()->is('admin/posts') || request()->is('admin/*/admin/*')) ? 'active' : '' }}">
                    Blog
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("a-properties") }}" class="nav-link {{ ( request()->is('admin/properties') || request()->is('admin/*/property/*')) ? 'active' : '' }}">
                    Properties
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("a-users") }}" class="nav-link {{ ( request()->is('admin/users') || request()->is('admin/*/user/*')) ? 'active' : '' }}">
                    Users
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("a-employees") }}" class="nav-link {{ ( request()->is('admin/employees') || request()->is('admin/*/employee/*')) ? 'active' : '' }}">
                    Employees
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("a-customers") }}" class="nav-link {{ ( request()->is('admin/customers') || request()->is('admin/*/customers/*')) ? 'active' : '' }}">
                    Customers
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("a-valuations") }}" class="nav-link {{ ( request()->is('admin/valuations') || request()->is('admin/valuation/*')) ? 'active' : '' }}">
                    Valuations
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("a-appointements") }}" class="nav-link {{ ( request()->is('admin/appointements') || request()->is('admin/*/appointement/*')) ? 'active' : '' }}">
                    Appointements
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("a-enquiries") }}" class="nav-link {{ ( request()->is('admin/enquiries') || request()->is('*/enquiry/*')) ? 'active' : '' }}">
                    Enquiries
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("a-branches") }}" class="nav-link {{ ( request()->is('admin/branches')) ? 'active' : '' }}">
                    Branches
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
                <img src="{{ asset('storage/' . $admin->avatar->image) }}" alt="Avatar" width="32" height="32" class="rounded-circle me-2">
                <strong>{{ $admin->f_name . " " . $admin->l_name }}</strong>
            </a>
            <ul class="dropdown-menu text-small shadow" aria-labelledby="dropdownUser2">
                <li><a class="dropdown-item" href="{{ route('a-profileShow', ['id' => Auth::guard('admin')->id()]) }}">Profile</a></li>
                <li><hr class="dropdown-divider"></li>
                <li>
                    <a class="dropdown-item">
                        <form action="{{ route('a-logout', ['id' => Auth::guard('admin')->id()]) }}" method="post">
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
