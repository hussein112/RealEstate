<footer>
    <div class="container d-flex flex-column">
        <div class="l-sm d-flex flex-wrap">
            <div class="logo m-1 p-2">
                LOGO
            </div>

            <div class="social-media container">
                <div class="flex">
                    <a href="{{ config("company.social_media.linkedin") }}" class="m-1"><iconify-icon icon="mdi:linkedin"></iconify-icon>
                    </a>
                    <a href="{{ config("company.social_media.twitter") }}" class="m-1"><iconify-icon icon="mdi:twitter"></iconify-icon>
                    </a>
                    <a href="{{ config("company.social_media.instagram") }}" class="m-1"><iconify-icon icon="mdi:instagram"></iconify-icon>
                    </a>
                    <a href="{{ config("company.social_media.facebook") }}" class="m-1"><iconify-icon icon="mdi:facebook"></iconify-icon>
                    </a>
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-around flex-wrap">
            <ul class="site-map custom-list m-1">
                <li class="l-item l-item-title">Company</li>
                <li class="l-item"><a href="{{ route("about") }}">About</a></li>
                <li class="l-item"><a href="{{ route("services") }}">Our Services</a></li>
                <li class="l-item"><a href="{{ route("blog") }}">Blog</a></li>
                <li class="l-item"><a href="{{ route("team") }}">Team</a></li>
                <li class="l-item"><a href="{{ route("privacy") }}">Privacy Policy</a></li>
                <li class="l-item"><a href="{{ route("terms") }}">Terms & Conditions</a></li>
            </ul>


            <ul class="site-map custom-list m-1">
                <li class="l-item l-item-title">Navigate to</li>
                @guest
                    <li class="l-item"><a href="{{ route("u-login") }}">Login</a></li>
                    <li class="l-item"><a href="{{ route("register") }}">Register</a></li>
                @endguest
                <li class="l-item"><a href="{{ route("propertiesForBuy") }}">Buy Property</a></li>
                <li class="l-item"><a href="{{ route("propertiesForRent") }}">Rent Property</a></li>
                <li class="l-item"><a href="{{ route("newAdvertise") }}">Sell Property</a></li>
            </ul>

            <ul class="site-map custom-list m-1">
                <li class="l-item l-item-title">Contact Us</li>
                <li class="l-item"><a href="tel:+{{config('company.contact.phone')}}" class="flex-center"><iconify-icon icon="material-symbols:phone-enabled"></iconify-icon> <span>{{config('company.contact.phone')}}</span></a></li>
                <li class="l-item"><a href="mailto:{{config('company.contact.email')}}" class="flex-center"><iconify-icon icon="material-symbols:alternate-email"></iconify-icon> <span>{{config('company.contact.email')}}</span></a></li>
                <li class="l-item"><a href="{{ route("contact") }}" class="flex-center"><iconify-icon icon="ant-design:form-outlined"></iconify-icon> <span>Contact</span></a></li>
            </ul>
        </div>

        <div class="copy">
            <p class="text-capitalize float-start">
                {{ config('company.name') }} {{ date("Y") }} &copy; All Rights Reserved.
            </p>

            <p class="text-capitalize float-end">
                Done By <a href="https://github.com/hussein112" class="developper">hussein khalil</a> &copy; all Rights reserved.
            </p>
        </div>
    </div>
</footer>
