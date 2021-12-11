@extends('templates.index')
@section('content')
    <div class="container sm:mx-auto p-3 border sm:my-6 sm:w-1/2 rounded-md">
        <form action="{{ route('register') }}" method="post" class="p-5 text-white">
            @csrf
            <h1 class="sm:text-xl">Register Page</h1>
            <hr class="my-3">
            <div class="flex flex-col space-y-3">
                <div class="flex flex-col space-y-3">
                    <p>Username</p>
                    <input type="text" name="username" autofocus autocomplete="off" value="{{ old('username') }}" class="w-full @error('username')border border-red-500 @enderror bg-white text-black rounded-md px-3 py-1">
                    @error('username')
                        <p class="text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col space-y-3">
                    <p>Nama</p>
                    <input type="text" name="nama" autocomplete="off" value="{{ old('nama') }}" class="w-full @error('nama')border border-red-500 @enderror bg-white text-black rounded-md px-3 py-1">
                    @error('nama')
                        <p class="text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col space-y-3">
                    <p>Email</p>
                    <input type="text" name="email" autocomplete="off" value="{{ old('email') }}" class="w-full @error('email')border border-red-500 @enderror bg-white text-black rounded-md px-3 py-1">
                    @error('email')
                        <p class="text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col space-y-3">
                    <p>Phone</p>
                    <input type="number" name="phone" autocomplete="off" value="{{ old('phone') }}" class="w-full @error('phone')border border-red-500 @enderror bg-white text-black rounded-md px-3 py-1">
                    @error('phone')
                        <p class="text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col space-y-3">
                    <p>Password</p>
                    <input type="password" name="password" autocomplete="off" value="{{ old('password') }}" class="w-full @error('password')border border-red-500 @enderror bg-white text-black rounded-md px-3 py-1">
                    @error('password')
                        <p class="text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col space-y-3">
                    <p>Confirm Password</p>
                    <input type="password" name="confirm_password" autocomplete="off" class="w-full @error('confirm_password')border border-red-500 @enderror bg-white text-black rounded-md px-3 py-1">
                    @error('confirm_password')
                        <p class="text-xs text-red-500">{{ $message }}</p>
                    @enderror
                </div>
                <div class="flex flex-col space-y-3 w-1/2 mx-auto">
                    <a href="" class="text-center text-blue-500 transition duration-300 hover:text-white">Already have an account?</a>
                    <input type="submit" value="Register" class="p-2 bg-blue-500 rounded-md transform transition duration-300 cursor-pointer hover:scale-105 hover:bg-blue-700">
                </div>
            </div>
        </form>
    </div>
@endsection