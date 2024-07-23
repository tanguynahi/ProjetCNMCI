<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=Edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="Page d'accueil de la plateforme CNMCI">
    <meta name="keyword" content="Page d'accueil de la plateforme CNMCI">
    <link rel="icon" href="{{ asset('assets/home/cnmci.jpg') }}" type="image/x-icon"> <!-- Favicon-->
    <title>{{ $title }}</title>
    <link rel="stylesheet" href="{{ asset('assets/home/cssbundle/swiper.min.css') }}">
    <link rel="stylesheet" href="{{ asset('assets/home/cssbundle/onepage.kit.min.css') }}">
    <!-- project css file  -->
    <link rel="stylesheet" href="{{ asset('assets/home/css/luno-style.css') }}">
    <!-- Jquery Core Js -->
    <script src="{{ asset('assets/home/js/plugins.js') }}"></script>

    @stack('css')
</head>
<body class="landing-page" data-luno="theme-blue" >
    <!-- Section: Header -->
    @include('partials.home_partials.header')
    @yield('content')
    <!-- Section: Footer -->
    @include('partials.home_partials.footer')


    <script src="{{ asset('assets/home/js/theme.js') }}"></script>
    <!-- Plugin Js -->
    <script src="{{ asset('assets/home/js/bundle/swiper.bundle.js') }}"></script>
    <script>
        // Easy selector helper function
        const select = (el, all = false) => {
            el = el.trim()
            if (all) {
                return [...document.querySelectorAll(el)]
            } else {
                return document.querySelector(el)
            }
        }
        // Easy event listener function
        const on = (type, el, listener, all = false) => {
            let selectEl = select(el, all)
            if (selectEl) {
                if (all) {
                    selectEl.forEach(e => e.addEventListener(type, listener))
                } else {
                    selectEl.addEventListener(type, listener)
                }
            }
        }
        // Event Timer
        var countDownDate = new Date("Nov 13, 2022 15:30:30").getTime();
        var x = setInterval(function() {
            var now = new Date().getTime();
            var distance = countDownDate - now;
            var days = Math.floor(distance / (1000 * 60 * 60 * 24));
            var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
            var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
            var seconds = Math.floor((distance % (1000 * 60)) / 1000);
            document.getElementById("eventdata").innerHTML = days + "d " + hours + "h " + minutes + "m " + seconds +
                "s ";
            if (distance < 0) {
                clearInterval(x);
                document.getElementById("eventdata").innerHTML = "EXPIRED";
            }
        }, 1000);
        /** * Hero carousel indicators */
        let heroCarouselIndicators = select("#hero-carousel-indicators")
        let heroCarouselItems = select('#heroCarousel .carousel-item', true)
        heroCarouselItems.forEach((item, index) => {
            (index === 0) ? heroCarouselIndicators.innerHTML +=
                "<li data-bs-target='#heroCarousel' data-bs-slide-to='" + index + "' class='active'></li>":
                heroCarouselIndicators.innerHTML += "<li data-bs-target='#heroCarousel' data-bs-slide-to='" +
                index + "'></li>"
        });
    </script>


  <!-- Vendor Script -->
  
    @include('vendor.sweetalert.alert')
    @stack('js')
</body>

</html>

