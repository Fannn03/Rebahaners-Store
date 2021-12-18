@extends('templates.home')
@section('content')
    <div class="container w-1/2 border p-5 rounded mx-auto">
        <div class="flex flex-col space-y-5 h-28 bg-local text-white center rounded-md p-3 px-5 bg-cover" style="background-image: linear-gradient(rgba(22, 20, 21, 0.8), rgba(22, 20, 21, 0.8)), url({{ asset('storage/images/category/'. $category->photo) }})">
            <p class="text-xl">{{ $category->name_category }}</p>
            <p class="text-gray-500">{{ $category->description }}</p>
        </div>
        <hr class="my-10">
        <div class="grid grid-cols-3 gap-4">
            @foreach ($product as $pd)
                <div class="rounded-md border text-white space-y-3 group transform transition hover:scale-105 cursor-pointer hover:bg-blue-500 duration-300 border-blue-500 p-5 flex flex-col">
                    <p class="text-lg">{{ $pd->name_product }}</p>
                    <p class="text-green-500 group-hover:text-green-300">IDR {{ number_format($pd->price) }}</p>
                </div>
            @endforeach
        </div>
    </div>
@endsection