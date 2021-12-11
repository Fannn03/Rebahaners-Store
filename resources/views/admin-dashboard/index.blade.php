@extends('templates.ad-index')
@section('content')
    <div class="border p-5 container rounded-md mx-auto">
        <div class="grid grid-cols-3 gap-4">
            {{-- Category --}}
            <div class="bg-blue-500 p-5 rounded-md group transition duration-300 transform hover:scale-105 text-white">
                <div class="flex-row flex justify-between mb-3">
                    <div class="flex flex-col">
                        <p class="text-lg">Total Category : {{ $category }}</p>
                        <p class="text-xs text-gray-300">list category rebahaners store</p>
                    </div>
                    <div class="border-l border-gray-500 pl-5">
                        <i class="fas fa-cubes fa-3x group-hover:text-yellow-500"></i>
                    </div>
                </div>
                <div class="border-t border-gray-500 px-3 pt-3">
                    <a href="{{ route('admin-category') }}" class="transition duration-300 hover:text-purple-800">Read More</a>
                </div>
            </div> 
            {{-- end category --}}
            {{-- product --}}
            <div class="bg-yellow-500 p-5 rounded-md group transition duration-300 transform hover:scale-105 text-white">
                <div class="flex-row flex justify-between mb-3">
                    <div class="flex flex-col">
                        <p class="text-lg">Total Products : {{ $product }}</p>
                        <p class="text-xs text-gray-300">list products rebahaners store</p>
                    </div>
                    <div class="border-l border-gray-500 pl-5">
                        <i class="fas fa-store fa-3x group-hover:text-blue-500"></i>
                    </div>
                </div>
                <div class="border-t border-gray-500 px-3 pt-3">
                    <a href="{{ route('admin-product') }}" class="transition duration-300 hover:text-purple-800">Read More</a>
                </div>
            </div>
            {{-- end product --}}
            {{-- order --}}
            <div class="bg-green-500 p-5 rounded-md group transition duration-300 transform hover:scale-105 text-white">
                <div class="flex-row flex justify-between mb-3">
                    <div class="flex flex-col">
                        <p class="text-lg">Total Products : 0</p>
                        <p class="text-xs text-gray-300">list orders rebahaners store</p>
                    </div>
                    <div class="border-l border-gray-500 pl-5">
                        <i class="fas fa-shopping-cart fa-3x group-hover:text-blue-500"></i>
                    </div>
                </div>
                <div class="border-t border-gray-500 px-3 pt-3">
                    <a href="#" class="transition duration-300 hover:text-purple-800">Read More</a>
                </div>
            </div>
            {{-- end order --}}
        </div>
    </div>
@endsection