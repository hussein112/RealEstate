<footer>
    <div class="container d-flex flex-column">
        <div class="l-sm d-flex flex-wrap">
            <div class="logo m-1 p-2">
                LOGO
            </div>

            <div class="social-media container">
                <div class="d-flex flex-wrap">
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

        <div class="s-n grid">
            <ul class="site-map custom-list m-1">
                <li class="l-item">Company</li>
                <li class="l-item"><a href="{{ route("about") }}">About</a></li>
                <li class="l-item"><a href="{{ route("services") }}">Our Services</a></li>
                <li class="l-item"><a href="{{ route("blog") }}">Blog</a></li>
                <li class="l-item"><a href="{{ route("team") }}">Team</a></li>
                <li class="l-item"><a href="{{ route("privacy") }}">Privacy Policy</a></li>
                <li class="l-item"><a href="{{ route("terms") }}">Terms & Conditions</a></li>
            </ul>


            <ul class="site-map custom-list m-1">
                <li class="l-item">Navigate to</li>
                @guest
                    <li class="l-item"><a href="{{ route("u-login") }}">Login</a></li>
                    <li class="l-item"><a href="{{ route("register") }}">Register</a></li>
                @endguest
                <li class="l-item"><a href="{{ route("propertiesForBuy") }}">Buy Property</a></li>
                <li class="l-item"><a href="{{ route("propertiesForRent") }}">Rent Property</a></li>
                <li class="l-item"><a href="{{ route("newAdvertise") }}">Sell Property</a></li>
            </ul>


            <ul class="site-map custom-list m-1">
                <li class="l-item">Contact Us</li>
                <li class="l-item"><a href="tel:+{{config('company.contact.phone')}}"><iconify-icon icon="material-symbols:phone-enabled"></iconify-icon> {{config('company.contact.phone')}}</a></li>
                <li class="l-item"><a href="mailto:{{config('company.contact.email')}}"><iconify-icon icon="material-symbols:alternate-email"></iconify-icon> {{config('company.contact.email')}}</a></li>
                <li class="l-item"><a href="{{ route("contact") }}"><iconify-icon icon="ant-design:form-outlined"></iconify-icon> Contact</a></li>
            </ul>

            <div class="newsletter m-1 p-2">
                <h6>Subscribe to our Newsletter: </h6>
                <form method="get" action="" class="d-flex flex-wrap">
                    <input type="email" name="" id="" class="form-control m-1" placeholder="Email">
                    <button type="submit" class="btn btn-primary m-1 center">
                        <iconify-icon icon="material-symbols:arrow-circle-right-outline-rounded"></iconify-icon>
                    </button>
                </form>
            </div>
        </div>

        <div class="copy">
            <p class="text-capitalize float-start">
                {{ config('company.name') }} {{ date("Y") }} &copy; All Rights Reserved.
            </p>

            <p class="text-capitalize float-end">
                Done By <a href="https://hussein112.github.io/portfolio/index.html" class="developper">hussein khalil</a> &copy; all Rights reserved.
            </p>
        </div>
    </div>
</footer>
