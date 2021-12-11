@extends('templates.index')
@section('content')
<div class="container sm:mx-auto p-3 border sm:my-6 sm:w-1/2 rounded-md">
    <form action="{{ route('login') }}" method="post" class="p-5 text-white">
        @csrf
        <h1 class="sm:text-xl">Login Page</h1>
            <hr class="my-3">
            @if (session('message'))
            <div class="bg-green-500 py-2 px-3 my-3 rounded-md">
                {{ session('message') }}
            </div>
            @endif
            <div class="flex flex-col space-y-3">
                <div class="flex flex-col space-y-3">
                    <p>Username</p>
                    <input type="text" name="username" autofocus autocomplete="off" value="{{ old('username') }}" class="w-full @error('username')border border-red-500 @enderror bg-white text-black rounded-md px-3 py-1">
                    @error('username')
                        <p class="text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col space-y-3">
                    <p>Password</p>
                    <input type="password" name="password" autofocus autocomplete="off" value="{{ old('password') }}" class="w-full @error('password')border border-red-500 @enderror bg-white text-black rounded-md px-3 py-1">
                    @error('password')
                        <p class="text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col space-y-3 w-1/3 mx-auto">
                    <a href="{{ route('register') }}" class="text-center text-blue-500 transition duration-300 hover:text-white">Don't have an account?</a>
                    <input type="submit" value="Login" class="p-2 bg-blue-500 rounded-md transform transition duration-300 cursor-pointer hover:scale-105 hover:bg-blue-700">
                </div>
            </div>
    </form>
</div>
@endsection