@extends('templates.ad-index')
@section('content')
<div class="container border px-5 pt-5 w-1/2 rounded-md text-white mx-auto">
    <div class="block border-b border-white p-3">
        <p class="text-xl">Create New Category</p>
    </div>
    <form action="{{ route('new-category') }}" class="flex flex-col my-5 px-3 space-y-3" method="post">
        @csrf
        <div class="flex flex-col space-y-3">
            <p>Name Category</p>
            <input type="text" name="name_category" autofocus autocomplete="off" class="rounded-md px-3 py-1 @error('name_category') border border-red-500 @enderror  text-black" value="{{ old('name_category') }}">
            @error('name_category')
                <p class="text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex flex-col py-5 space-y-2">
            <input type="submit" value="Create" class="p-2 px-5 w-1/2 mx-auto bg-blue-500 rounded-md">
            <a href="{{ route('admin-category') }}" class="p-2 px-5 w-1/2 mx-auto rounded-md bg-red-500 text-center">Back</a>
        </div>
    </form>
</div>
@endsection