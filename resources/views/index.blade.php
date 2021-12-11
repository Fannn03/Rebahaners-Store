@extends('templates.index')
@section('content')
<!-- jumbotron -->
<div class="container-md py-12 px-8 sm:p-28 bg-cover bg-no-repeat bg-top"
    style="background-image:linear-gradient(rgba(22, 20, 21, 0.8), rgba(22, 20, 21, 0.8)), url({{ asset('images/yss.jpg') }})">
    <div class="flex opacity-100 flex-col space-y-3 sm:space-y-5 sm:w-2/3">
        <h1 class="text-2xl text-gray-300">Top up Diamond dan Pembelian Mobile Games</h1>
        <p class="sm:text-lg text-gray-400">Menyediakan Jasa Top up dan Pembelian Diamond Mobile Legends, Starlight
            Mobile Legends, Diamond Free Fire, UC PUBG termurah.</p>
    </div>
</div>
<!-- end jumbotron -->
<!-- div content -->
<div class="" id="produk"></div>
<div class="container my-24 sm:my-32 sm:px-24 mx-auto flex flex-col text-center text-gray-300 space-y-24 px-10">
    <div class="flex flex-col mx-auto space-y-5 px-5 sm:w-1/2">
        <h1 class="text-2xl sm:text-3xl">Produk Kami</h1>
        <p class="text-gray-400 sm:text-xl">100% Layanan produk kami adalah memberikan pelayanan terbaik dan
            tercepat bila tidak ada kendala atau hambatan.</p>
    </div>
    <div class="flex flex-col mx-auto space-y-5 px-5 sm:w-1/2 w-full">
        <h1 class="text-2xl sm:text-3xl">Mobile Games</h1>
        <hr>
    </div>
    <x-mobile_games></x-mobile_games>
    <div class="flex flex-col mx-auto space-y-5 px-5 sm:w-1/2 w-full">
        <h1 class="text-2xl sm:text-3xl">Premium Account</h1>
        <hr>
    </div>
    <x-premium_account></x-premium_account>
    <hr>
    <div class="flex flex-col mx-auto space-y-5 px-5 sm:w-1/2">
        <h1 class="text-2xl sm:text-3xl">Hubungi Kami</h1>
        <p class="text-gray-400 sm:text-xl">100% Layanan produk kami adalah memberikan pelayanan terbaik dan
            tercepat bila tidak ada kendala atau hambatan.</p>
    </div>
</div>
@endsection
