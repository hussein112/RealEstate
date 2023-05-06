<!-- Start Sidebar -->
@php($employee = App\Models\Employee::find(Auth::guard('employee')->id()))
<div class="toast-container position-fixed bottom-0 end-0 p-3">
</div>
<script>
    window.onload = function(){
        const toastElList = document.querySelectorAll('.toast')
        const toastList = [...toastElList].map(toastEl => new bootstrap.Toast(toastEl))

        window.Echo.private('employee.enquiry.{{$employee->id}}')
            .listen('.newEnquiry', (data) => {
                createToast(data, "Enquiry");
                createNewEnquiryNotification(data);
            });
        window.Echo.private('employee.valuation.{{$employee->id}}')
            .listen('.newValuationAssigned', (data) => {
                createToast(data, "Valuation");
                createNewValuationNotification(data);
            });

        function createNewEnquiryNotification(data){
            const container = document.querySelector(".notifications .offcanvas-body .notifications-list");
            const notificationContainer = document.createElement("a");
            notificationContainer.setAttribute("href", "enquiry/" + data.enquiry.id);
            notificationContainer.setAttribute("class", "notification unread-notification");

            let notificationDescription = document.createElement("div");
            notificationDescription.setAttribute("class", "d-flex w-100 justify-content-between");

            let notificationTitle = document.createElement("h5");
            notificationTitle.setAttribute("class", "mb-1");
            notificationTitle.innerHTML = "An Enquiry issued by: " + data.enquiry.issuer_name + " is Assigned for you.";

            let circle = createCircleNotification();

            notificationTitle.appendChild(circle);

            let notificationTime = document.createElement("small");
            notificationTime.innerHTML = "{{ Carbon\Carbon::parse(Date::now())->diffForHumans(Carbon\Carbon::now()) }}";


            notificationDescription.appendChild(notificationTitle);
            notificationDescription.appendChild(notificationTime);

            notificationContainer.appendChild(notificationDescription);


            container.insertBefore(notificationContainer, container.firstChild);
        }


        function createNewValuationNotification(data){
            const container = document.querySelector(".notifications .offcanvas-body .notifications-list");
            const notificationContainer = document.createElement("a");
            notificationContainer.setAttribute("href", "valuation/" + data.valuation.id);
            notificationContainer.setAttribute("class", "notification unread-notification");

            let notificationDescription = document.createElement("div");
            notificationDescription.setAttribute("class", "d-flex w-100 justify-content-between");

            let notificationTitle = document.createElement("h5");
            notificationTitle.setAttribute("class", "mb-1");
            notificationTitle.innerHTML = data.valuation.full_name + " Requested a new Valuation";

            let circle = createCircleNotification();

            notificationTitle.appendChild(circle);

            let notificationTime = document.createElement("small");
            notificationTime.innerHTML = "{{ Carbon\Carbon::parse(Date::now())->diffForHumans(Carbon\Carbon::now()) }}";


            notificationDescription.appendChild(notificationTitle);
            notificationDescription.appendChild(notificationTime);

            notificationContainer.appendChild(notificationDescription);


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
            toastBody.innerHTML = (title === "Valuation") ? data.valuation.full_name + " Valuation Assigned For You" : data.enquiry.id + " Assigned for you.";

            toast.appendChild(toastHeader);
            toast.appendChild(toastBody);
            const newEnquiryToast = new bootstrap.Toast(toast)

            container.insertBefore(toast, container.firstChild);
            newEnquiryToast.show();
        }

    }
</script>
<div class="sidebar-wrapper collapse collapse-horizontal" id="sidebar">
    <aside class="d-flex flex-column flex-shrink-0 p-3">
        <ul class="nav nav-pills mb-auto">
            <br>
            <div class="notifications flex-center">
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
                            <div class="notifications-list">
                                @if(! empty(auth()->user()->notifications))
                                    @foreach(auth()->user()->unreadNotifications as $notification)
                                        @php($types = explode("\\", $notification->type))
                                        @php($notification_type = end($types))
                                        @if($notification_type == "NewValuation")
                                            <a href="{{ route("e-valuationDetails", ['id' => $notification->data['valuation_id'], 'notification_id' => $notification->id]) }}" class="notification unread-notification" aria-current="true">
                                                    <div class="d-flex w-100 justify-content-between">
                                                        <h5 class="mb-1">{{ $notification->data['message'] }}
                                                            <span class="position-absolute top-0 start-100 translate-middle p-2 bg-warning border border-light rounded-circle">
                                                            <span class="visually-hidden">New alerts</span>
                                                         </span>
                                                        </h5>
                                                        <small> {{ Carbon\Carbon::parse($notification->created_at)->diffForHumans(Carbon\Carbon::now()) }} </small>
                                                    </div>
                                                </a>
                                        @elseif($notification_type == "AssignedEnquiry")
                                            <a href="{{ route("e-enquiryDetails", ['id' => $notification->data['enquiry_id'], 'notification_id' => $notification->id]) }}" class="notification unread-notification" aria-current="true">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1">{{ $notification->data['message'] }}
                                                        <span class="position-absolute top-0 start-100 translate-middle p-2 bg-warning border border-light rounded-circle">
                                                            <span class="visually-hidden">New alerts</span>
                                                         </span>
                                                    </h5>
                                                    <small> {{ Carbon\Carbon::parse($notification->created_at)->diffForHumans(Carbon\Carbon::now()) }} </small>
                                                </div>
                                            </a>
                                        @else
                                            <!-- Assinged Advertise -->
                                            <a href="{{ route("e-advertiseDetails", ['id' => $notification->data['advertise_id'], 'notification_id' => $notification->id]) }}" class="notification unread-notification" aria-current="true">
                                                <div class="d-flex w-100 justify-content-between">
                                                    <h5 class="mb-1">{{ $notification->data['message'] }}
                                                        <span class="position-absolute top-0 start-100 translate-middle p-2 bg-warning border border-light rounded-circle">
                                                            <span class="visually-hidden">New alerts</span>
                                                         </span>
                                                    </h5>
                                                    <small> {{ Carbon\Carbon::parse($notification->created_at)->diffForHumans(Carbon\Carbon::now()) }} </small>
                                                </div>
                                            </a>
                                        @endif
                                            @endforeach
                                    <hr>
                                    @foreach(auth()->user()->readNotifications as $notification)
                                        <div class="notification read-notification" aria-current="true">
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
                <a href="{{ route("e-properties") }}" class="nav-link {{ ( request()->is('employee/properties') || request()->is('employee/add/property') || request()->is('employee/edit/property/*')) ? 'active' : '' }}">
                    Properties
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("e-users") }}" class="nav-link {{ ( request()->is('employee/users') || request()->is('employee/add/user') || request()->is('employee/edit/user/*') ) ? 'active' : '' }}">
                    Users
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("e-customers") }}" class="nav-link {{ ( request()->is('employee/customers') || request()->is('employee/add/customer') || request()->is('employee/edit/customer/*')) ? 'active' : '' }}">
                    Customers
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("e-valuations") }}" class="nav-link {{ ( request()->is('employee/valuations') || request()->is('employee/valuation/*')) ? 'active' : '' }}">
                    Valuations
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("e-appointements") }}" class="nav-link {{ ( request()->is('employee/appointements') || request()->is('employee/add/appointement') || request()->is('employee/*/appointement/*')) ? 'active' : '' }}">
                    Appointements
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("e-enquiries") }}" class="nav-link {{ ( request()->is('employee/enquiries') || request()->is('employee/enquiry/*')) ? 'active' : '' }}">
                    Enquiries
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route("e-advertisements") }}" class="nav-link {{ ( request()->is('employee/advertisements') || request()->is('employee/enquiry/*')) ? 'active' : '' }}">
                    Advertisements
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
