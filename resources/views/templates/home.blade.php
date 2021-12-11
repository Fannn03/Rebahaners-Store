<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1, user-scalable=no"">
    <link rel=" stylesheet" href="{{ mix('css/app.css') }}">
    <link href="https://fonts.googleapis.com/css2?family=Balsamiq+Sans&display=swap" rel="stylesheet">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <title>Rebahaners Store</title>
    <script src="src/fa/js/all.min.js"></script>
</head>

<body class="font-sans bg-gray-800" id="home">
    <!-- navbar -->
    <div class="container-md py-5 z-50 px-8 sm:p-10 bg-gray-800 sticky space-y-5 top-0 text-white">
        <div class="flex justify-between">
            <a href="{{ route('index-page') }}" class="text-2xl hover:text-purple-500 transition duration-300">Rebahaners Store</a>
            <button onclick="showhide()" class="sm:hidden"><i class="fas fa-list fa-lg my-auto"></i></button>
            <div class="hidden sm:flex sm:flex-row sm:space-x-5 sm:my-auto">
                <a href="" class="my-auto">Home</a>
                <a href="" class="my-auto">Product</a>
                <div class="flex flex-col group">
                    <img src="{{ asset('images/user.jpg') }}" class="h-10 gro transition duration-300 cursor-pointer rounded-full" alt="">
                    <div class="absolute hidden right-8 mt-10 group-hover:flex bg-white text-black w-48 space-y-2 flex-col my-3 px-3 py-3 rounded-md">
                        <a href="" class="py-2 transition duration-300 hover:bg-blue-400 hover:text-white rounded-md px-2">Profile</a>
                        @if (Auth::user()->role == "admin" OR Auth::user()->role == "mod")
                        <a href="{{ route('admin-dashboard') }}" class=" py-2 transition duration-300 hover:bg-blue-400 hover:text-white rounded-md px-2">Dashboard</a>
                        @endif
                        <hr>
                        <a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout').submit();" class="transition py-2 duration-300 hover:bg-blue-400 hover:text-white rounded-md px-2">Logout</a>
                    </div>
                </div>

            </div>
        </div>
        <div class="hidden flex-col sm:hidden space-y-5" id="dropdown">
            @if (Request::url() === 'http://127.0.0.1:8000')
                <a href="#home" class="transition duration-300 hover:text-purple-500">Home</a>
                <a href="#produk" class="transition duration-300 hover:text-purple-500">Produk</a>
                <a href="#hubungi" class="transition duration-300 hover:text-purple-500">Hubungi</a>
            @endif
            <a href="{{ route('register') }}" class="transition duration-300 hover:text-purple-500">Register</a>
            <a href="{{ route('login') }}" class="transition duration-300 hover:text-purple-500">Login</a>
        </div>
    </div>
    @yield('content')

    <form action="{{ route('logout') }}" id="logout" method="POST">
        @csrf
    </form>
</body>
<script>
    $(document).ready(function () {
        // Add smooth scrolling to all links
        $("a").on('click', function (event) {

            // Make sure this.hash has a value before overriding default behavior
            if (this.hash !== "") {
                // Prevent default anchor click behavior
                event.preventDefault();

                // Store hash
                var hash = this.hash;

                // Using jQuery's animate() method to add smooth page scroll
                // The optional number (800) specifies the number of milliseconds it takes to scroll to the specified area
                $('html, body').animate({
                    scrollTop: $(hash).offset().top
                }, 800, function () {

                    // Add hash (#) to URL when done scrolling (default click behavior)
                    window.location.hash = hash;
                });
            } // End if
        });
    });

    function showhide() {
        let dropdown = document.getElementById('dropdown');

        if (dropdown.classList.contains('hidden')) {
            dropdown.classList.remove('hidden');
            dropdown.classList.add('flex');
        } else {
            dropdown.classList.remove('flex');
            dropdown.classList.add('hidden');
        }

    }

</script>

</html>
