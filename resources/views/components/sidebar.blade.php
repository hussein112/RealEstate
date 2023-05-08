<!-- Start Sidebar -->
@php($admin = App\Models\Admin::find(Auth::guard('admin')->id()))
<div class="toast-container position-fixed bottom-0 end-0 p-3">
</div>
<div class="sidebar-wrapper collapse collapse-horizontal" id="sidebar">
    <aside class="d-flex flex-column flex-shrink-0 p-3">
        <ul class="nav nav-pills mb-auto">
            <br>
            <div class="notifications admin-notifications flex-center">
                <!-- Start Notifications List -->
                <button class="btn btn-notification position-relative" type="button" data-bs-toggle="offcanvas" data-bs-target="#notifications" aria-controls="notifications">
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
                        <form action="{{ route("a-deleteNotifications") }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button class="btn btn-link">Delete All</button>
                        </form>
                        <form action="{{ route("a-readNotifications") }}" method="POST">
                            @csrf
                            <button class="btn btn-link">Mark All As Read</button>
                        </form>
                        <hr>
                    </div>

                    <div class="offcanvas-body">
                        <div>
                            <!-- Start Notification -->
                            <div class="notifications-list">
                                <script>
                                    const toastElList = document.querySelectorAll('.toast')
                                    const toastList = [...toastElList].map(toastEl => new bootstrap.Toast(toastEl))
                                    window.onload = function(){
                                        window.Echo.private('admin.valuation.{{$admin->id}}')
                                            .listen('.valuationRequest', (data) => {
                                                createNewValuationNotification(data);
                                                createToast(data, "Valuation");
                                        });
                                        window.Echo.private('admin.enquiry')
                                            .listen('.unAssignedEnquiry', (data) => {
                                                createNewUnassignedEnquiryNotification(data);
                                                createToast(data, "Enquiry");
                                            });
                                        window.Echo.private('admin.advertise.{{$admin->id}}')
                                            .listen('.unAssignedAdvertisement', (data) => {
                                                console.log(data);
                                                createNewUnassignedEnquiryNotification(data);
                                                createToast(data, "Advertisement");
                                            });
                                    }

                                    function createNewValuationNotification(data){
                                        const container = document.querySelector(".notifications .offcanvas-body .notifications-list");
                                        const notificationContainer = document.createElement("a");

                                        notificationContainer.setAttribute("href", "valuation/request/" + data.valuation.id);
                                        notificationContainer.setAttribute("class", "notification unread-notification");

                                        let notificationDescription = document.createElement("div");
                                        notificationDescription.setAttribute("class", "d-flex w-100 justify-content-between");

                                        let notificationTitle = document.createElement("h5");
                                        notificationTitle.setAttribute("class", "mb-1");
                                        notificationTitle.innerHTML = data.valuation.full_name + " Requested a Valuation";

                                        let notificationTime = document.createElement("small");
                                        notificationTime.innerHTML = "{{ Carbon\Carbon::parse(Date::now())->diffForHumans(Carbon\Carbon::now()) }}";

                                        let notificationPurpose = document.createElement("p");
                                        notificationPurpose.setAttribute("class", "mb-1");
                                        notificationPurpose.innerText = "Property For " + (data.for === 1) ? "Sell" : "Rent";


                                        let circle = createCircleNotification();

                                        notificationPurpose.appendChild(circle);

                                        notificationDescription.appendChild(notificationTitle);
                                        notificationDescription.appendChild(notificationTime);


                                        notificationContainer.appendChild(notificationDescription);
                                        notificationContainer.appendChild(notificationPurpose);


                                        container.insertBefore(notificationContainer, container.firstChild);
                                    }

                                    function createNewUnassignedEnquiryNotification(data){
                                        const container = document.querySelector(".notifications .offcanvas-body .notifications-list");
                                        const notificationContainer = document.createElement("a");

                                        notificationContainer.setAttribute("href", "enquiry/assign/" + data.enquiry.enquiry_id);
                                        notificationContainer.setAttribute("class", "notification unread-notification");

                                        let notificationDescription = document.createElement("div");
                                        notificationDescription.setAttribute("class", "d-flex w-100 justify-content-between");

                                        let notificationTitle = document.createElement("h5");
                                        notificationTitle.setAttribute("class", "mb-1");
                                        notificationTitle.innerHTML = "Enquiry #" + data.enquiry.id + " Cannot Be Assigned";

                                        let notificationTime = document.createElement("small");
                                        notificationTime.innerHTML = "{{ Carbon\Carbon::parse(Date::now())->diffForHumans(Carbon\Carbon::now()) }}";

                                        let notificationPurpose = document.createElement("p");
                                        notificationPurpose.setAttribute("class", "mb-1");
                                        notificationPurpose.innerText = data.message;


                                        let circle = createCircleNotification();

                                        notificationPurpose.appendChild(circle);

                                        notificationDescription.appendChild(notificationTitle);
                                        notificationDescription.appendChild(notificationTime);


                                        notificationContainer.appendChild(notificationDescription);
                                        notificationContainer.appendChild(notificationPurpose);


                                        container.insertBefore(notificationContainer, container.firstChild);
                                    }

                                    function createCircleNotification(){
                                        let parent = document.createElement("span");
                                        parent.setAttribute("class", "position-absolute top-0 start-100 translate-middle p-2 bg-warning border border-light rounded-circle");
                                        let child = document.createElement("span");
                                        child.setAttribute("class", "visually-hidden");
                                        child.innerHTML = "New Alerts";

                                        parent.appendChild(child);

                                        return parent;
                                    }

                                    function createToast(data, title){
                                        let container = document.querySelector(".toast-container");
                                        let toast = document.createElement("div");
                                        toast.setAttribute("class", "toast");
                                        toast.setAttribute("role", "alert");
                                        toast.setAttribute("aria-live", "assertive");
                                        toast.setAttribute("aria-atomic", "true");


                                        let toastHeader = document.createElement("div");
                                        toastHeader.setAttribute("class", "toast-header");


                                        let toastTitle = document.createElement("strong");
                                        toastTitle.setAttribute("class", "me-auto");
                                        toastTitle.innerHTML = "New " + title;


                                        let toastDate = document.createElement("small");
                                        toastDate.innerHTML = "{{ Carbon\Carbon::parse(Date::now())->diffForHumans(Carbon\Carbon::now()) }}";

                                        let toastDismiss = document.createElement("button");
                                        toastDismiss.setAttribute("type", "button");
                                        toastDismiss.setAttribute("class", "btn-close");
                                        toastDismiss.setAttribute("data-bs-dismiss", "toast");
                                        toastDismiss.setAttribute("aria-label", "close");


                                        toastHeader.appendChild(toastTitle);
                                        toastHeader.appendChild(toastDate);
                                        toastHeader.appendChild(toastDismiss);


                                        let toastBody = document.createElement("div");
                                        toastBody.setAttribute("class", "toast-body");
                                        toastBody.innerHTML = (title === "Valuation") ? data.valuation.full_name + " Requested a Valuation" : data.enquiry.id + " Cannot be assigned to any of the employees, since they are all at full capacity";

                                        toast.appendChild(toastHeader);
                                        toast.appendChild(toastBody);
                                        const newEnquiryToast = new bootstrap.Toast(toast)

                                        container.insertBefore(toast, container.firstChild);
                                        newEnquiryToast.show();
                                    }
                                </script>
                                @if(! empty(auth()->user()->notifications))
                                    @foreach(auth()->user()->unreadNotifications as $notification)
                                        @php($types = explode("\\", $notification->type))
                                        @php($notification_type = end($types))
                                        @if($notification_type == "ValuationRequested")
                                            <a href="{{ route("valuationRequest", ['id' => $notification->data['valuation_id'], 'notification_id' => $notification->id]) }}" class="notification unread-notification" aria-current="true">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1">{{ $notification->data['full_name'] }} Requested a Valuation
                                                        <span class="position-absolute top-0 start-100 translate-middle p-2 bg-warning border border-light rounded-circle">
                                                        <span class="visually-hidden">New alerts</span>
                                                     </span>
                                                    </h5>
                                                    <small> {{ Carbon\Carbon::parse($notification->created_at)->diffForHumans(Carbon\Carbon::now()) }} </small>
                                                </div>
                                                <p class="mb-1">Property For {{ $notification->data['for'] }}</p>
                                            </a>
                                        @else
                                            <!-- Assign Enquiry Manually -->
                                            <a href="{{ route("a-assignEnquiry", ['enquiry_id' => $notification->data['enquiry_id'], 'notification_id' => $notification->id]) }}" class="notification unread-notification" aria-current="true">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1"> Enquiry Cannot be Assigned
                                                        <span class="position-absolute top-0 start-100 translate-middle p-2 bg-warning border border-light rounded-circle">
                                                        <span class="visually-hidden">New alerts</span>
                                                     </span>
                                                    </h5>
                                                    <small> {{ Carbon\Carbon::parse($notification->created_at)->diffForHumans(Carbon\Carbon::now()) }} </small>
                                                </div>
                                                <p class="mb-1">{{ $notification->data['message'] }}</p>
                                            </a>
                                        @endif
                                    @endforeach
                                    <hr>
                                    @foreach(auth()->user()->readNotifications as $notification)
                                        @php($types = explode("\\", $notification->type))
                                        @php($notification_type = end($types))
                                        @if($notification_type == "ValuationRequested")
                                            <div class="notification read-notification" aria-current="true">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1">{{ $notification->data['full_name'] }} Requested a Valuation</h5>
                                                    <small> {{ Carbon\Carbon::parse($notification->created_at)->diffForHumans(Carbon\Carbon::now()) }} </small>
                                                </div>
                                                <p class="mb-1">Property For {{ $notification->data['for'] }}</p>
                                            </div>
                                        @else
                                            <a href="{{ route("a-assignEnquiry", ['enquiry_id' => $notification->data['enquiry_id'], 'notification_id' => $notification->id]) }}" class="notification read-notification" aria-current="true">
                                                <div class="">
                                                    <h5 class="mb-1"> Enquiry Cannot be Assigned
                                                        <span class="position-absolute top-0 start-100 translate-middle p-2 bg-warning border border-light rounded-circle">
                                                    <span class="visually-hidden">New alerts</span>
                                                 </span>
                                                    </h5>
                                                    <small> {{ Carbon\Carbon::parse($notification->created_at)->diffForHumans(Carbon\Carbon::now()) }} </small>
                                                </div>
                                                <p class="mb-1">{{ $notification->data['message'] }}</p>
                                            </a>
                                        @endif
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
                <a href="{{ route("a-properties") }}" class="nav-link {{ ( request()->is('admin/properties') || request()->is('admin/*/property/*')) ? 'active' : '' }}">
                    Properties
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("a-advertisements") }}" class="nav-link {{ ( request()->is('admin/advertisements') || request()->is('admin/*/advertisements/*')) ? 'active' : '' }}">
                    Advertisements
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("a-posts") }}" class="nav-link  {{ ( request()->is('admin/posts') || request()->is('admin/*/admin/*')) ? 'active' : '' }}">
                    Blog
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
                <a href="{{ route("settings") }}" class="nav-link {{ ( request()->is('admin/settings')) ? 'active' : '' }}">
                    Settings
                </a>
            </li>

            <div class="d-flex flex-column my-2">
                <li class="nav-item colors mx-2">
                    <div class="form-check form-switch">
                        <input class="form-check-input" type="checkbox" role="switch" id="theme">
                        <label class="form-check-label" for="theme">Color</label>
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
