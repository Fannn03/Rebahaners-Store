@extends('templates.home')
@section('content')
<div class="text-white p-5">
    <div class="container mx-auto p-5 border rounded w-2/3">
        <div class=" p-3 relative flex">
            <img src="https://itemku.com/_next/image?url=https%3A%2F%2Fd1x91p7vw3vuq8.cloudfront.net%2Fplaceholder%2F2021121%2Fbjhmyerx73jgys4z9ljhu8.png&w=1920&q=75" class="rounded-lg bg-cover w-full" alt="">
        </div>
        <hr class="my-5">
        <div class="flex my-5 flex-row flex-wrap gap-4 justify-center">
            @foreach ($category as $ct)
                <a href="{{ url('/category/' . $ct->slug) }}" class="flex flex-wrap flex-col w-1/4 space-y-3 bg-local transform transition duration-300 hover:scale-110 rounded-md p-3 bg-cover" style="background-image: linear-gradient(rgba(22, 20, 21, 0.8), rgba(22, 20, 21, 0.8)), url({{ asset('storage/images/category/'. $ct->photo) }})">
                    <p>{{ $ct->name_category }}</p>
                    <p class="text-gray-400 text-sm">{{ $ct->description }}</p>
                </a>
            @endforeach
        </div>
    </div>
</div>
@endsection