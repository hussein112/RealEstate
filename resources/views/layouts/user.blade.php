<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <meta name="description" content="Company Description">
    <meta name="keywords" content="Company Keywords">
    <meta name="author" content="Hussein Khalil">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">
    <link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">

    @vite(['resources/css/style.css', 'resources/js/app.js', 'resources/js/ranges.js', 'resources/js/colors.js'])
</head>
<body>
{{ $header }}

<main>
    {{ $main }}
</main>

<footer>
    <div class="container d-flex flex-column">
        <div class="l-sm d-flex flex-wrap">
            <div class="logo m-1 p-2">
                <a href="{{ route('dashboard') }}">
                    <x-application-logo class="block h-9 w-auto fill-current text-gray-800" />
                </a>
            </div>


            <div class="social-media container">
                <div class="d-flex flex-wrap">
                    <a href="#" class="m-1"><iconify-icon icon="mdi:linkedin"></iconify-icon>
                    </a>
                    <a href="#" class="m-1"><iconify-icon icon="mdi:twitter"></iconify-icon>
                    </a>
                    <a href="#" class="m-1"><iconify-icon icon="mdi:instagram"></iconify-icon>
                    </a>
                    <a href="#" class="m-1"><iconify-icon icon="mdi:facebook"></iconify-icon>
                    </a>
                </div>
            </div>
        </div>

        <div class="s-s d-flex flex-column">
            <div class="site-map d-flex flex-wrap">
                <ul class="company list-group list-group-flush m-1">
                    <li class="list-group-item active">Company</li>
                    <li class="list-group-item"><a href="about.html">About</a></li>
                    <li class="list-group-item"><a href="services.html">Our Services</a></li>
                    <li class="list-group-item"><a href="blog.html">Blog</a></li>
                    <li class="list-group-item"><a href="team.html">Team</a></li>
                    <li class="list-group-item"><a href="policy.html">Privacy Policy</a></li>
                    <li class="list-group-item"><a href="terms.html">Terms & Conditions</a></li>
                </ul>


                <ul class="navigate list-group list-group-flush m-1">
                    <li class="list-group-item active">Navigate to</li>
                    <li class="list-group-item"><a href="login.html">Login</a></li>
                    <li class="list-group-item"><a href="signup.html">Register</a></li>
                    <li class="list-group-item"><a href="#">Buy Property</a></li>
                    <li class="list-group-item"><a href="#">Rent Property</a></li>
                    <li class="list-group-item"><a href="#">Sell Property</a></li>
                </ul>


                <ul class="contact list-group list-group-flush m-1">
                    <li class="list-group-item active">Contact Us</li>
                    <li class="list-group-item"><a href="tel:+9611234565"><iconify-icon icon="material-symbols:phone-enabled"></iconify-icon> 0096103123456</a></li>
                    <li class="list-group-item"><a href="mailto:1@2.com"><iconify-icon icon="material-symbols:alternate-email"></iconify-icon> 1@2.com</a></li>
                    <li class="list-group-item"><a href="contact.html"><iconify-icon icon="ant-design:form-outlined"></iconify-icon> Contact</a></li>
                </ul>


                <div class="newsletter m-1 p-2">
                    <h3>Subscribe to our Newsletter: </h3>
                    <form action="" class="d-flex flex-wrap">
                        <input type="text" name="" id="" class="form-control m-1" placeholder="Full Name">
                        <input type="email" name="" id="" class="form-control m-1" placeholder="Email">
                        <button type="submit" class="btn btn-primary m-1 center">
                            <iconify-icon icon="material-symbols:arrow-circle-right-outline-rounded"></iconify-icon>
                        </button>
                    </form>
                </div>
            </div>


        </div>

        <div class="copy">
            <p class="text-capitalize float-start">
                Read Estate Compnay L.T.D, 2022 &copy; All Rights Reserved.
            </p>

            <p class="text-capitalize float-end">
                Done By <a href="#">hussein khalil</a> &copy; all Rights reserved.
            </p>
        </div>

    </div>

</footer>
<script src="https://code.jquery.com/jquery-3.6.3.min.js" integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU=" crossorigin="anonymous"></script>
<script src="https://code.iconify.design/iconify-icon/1.0.2/iconify-icon.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>
<script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
</body>
</html>
