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
            <a href="{{ route('admin-dashboard') }}" class="text-2xl hover:text-purple-500 transition duration-300">Admin Dashboard</a>
            <button onclick="showhide()" class="sm:hidden"><i class="fas fa-list fa-lg my-auto"></i></button>
            <div class="hidden sm:flex sm:flex-row sm:space-x-10 sm:my-auto">
                <div>
                    <button onclick="shownotif();" class="transform transition duration-300 hover:scale-110">
                        <i  class="far fa-bell fa-2x mt-1"></i>
                    </button>
                    <div id="notif" class="bg-white absolute hidden rounded-md right-28 w-1/4">
                        <div class="border-b bg-blue-500 rounded-t-md p-3 block text-center text-white">
                            Dashboard Notifications
                        </div>
                        <div class="overflow-y-auto h-32">
                            <div class="text-gray-800 text-left">
                                <div class="p-3 justify-between">
                                    <p class="text-sm">Diamond Mobile Legends 400 Diamond</p>
                                    <div class="flex flex-row justify-between mt-2">
                                        <p class="text-gray-500 text-xs">user220483</p>
                                        <p class="text-gray-500 text-xs">20 Hours ago</p>
                                    </div>
                                </div>
                            </div>
                            <div class="text-gray-800 bg-gray-200 text-left">
                                <div class="p-3 justify-between">
                                    <p class="text-sm">Diamond Free Fire 510 Diamond</p>
                                    <div class="flex flex-row justify-between mt-2">
                                        <p class="text-gray-500 text-xs">user220483</p>
                                        <p class="text-gray-500 text-xs">2 Days ago</p>
                                    </div>
                                </div>
                            </div>
                            <div class="text-gray-800  text-left">
                                <div class="p-3 justify-between">
                                    <p class="text-sm">Diamond Mobile Legends 400 Diamond</p>
                                    <div class="flex flex-row justify-between mt-2">
                                        <p class="text-gray-500 text-xs">user220483</p>
                                        <p class="text-gray-500 text-xs">20 Hours ago</p>
                                    </div>
                                </div>
                            </div>
                            <div class="text-gray-800 bg-gray-200 text-left">
                                <div class="p-3 justify-between">
                                    <p class="text-sm">Diamond Free Fire 510 Diamond</p>
                                    <div class="flex flex-row justify-between mt-2">
                                        <p class="text-gray-500 text-xs">user220483</p>
                                        <p class="text-gray-500 text-xs">2 Days ago</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="border-t bg-blue-500 text-center rounded-b-md text-white p-1">
                            <a href="" class="transition duration-300 hover:text-gray-500 cursor-pointer">Read More</a>
                        </div>
                    </div>
                </div>
                <div class="flex flex-col group">
                    <img src="{{ asset('images/user.jpg') }}" class="h-10 gro transition duration-300 cursor-pointer rounded-full" alt="">
                    <div class="absolute hidden right-8 mt-10 group-hover:flex bg-white text-black w-48 space-y-2 flex-col my-3 px-3 py-3 rounded-md">
                        <a href="" class="py-2 transition duration-300 hover:bg-blue-400 hover:text-white rounded-md px-2">Profile</a>
                        @if (Auth::user()->role == "admin" OR Auth::user()->role == "mod")
                        <a href="{{ route('home') }}" class=" py-2 transition duration-300 hover:bg-blue-400 hover:text-white rounded-md px-2">Homepage</a>
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
    function shownotif() {
        let dropdown = document.getElementById('notif');

        if (dropdown.classList.contains('hidden')) {
            dropdown.classList.remove('hidden');
        } else {
            dropdown.classList.add('hidden');
        }

    }

</script>

</html>
