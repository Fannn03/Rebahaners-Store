@extends('templates.ad-index')
@section('content')
<div class="container border px-5 pt-5 w-1/2 rounded-md text-white mx-auto">
    <div class="block border-b border-white p-3">
        <p class="text-xl">Create New Category</p>
    </div>
    <form action="{{ route('new-category') }}" class="flex flex-col my-5 px-3 space-y-3" method="post" enctype="multipart/form-data">
        @csrf
        <div class="flex flex-col space-y-3">
            <p>Name Category</p>
            <input type="text" name="name_category" autofocus autocomplete="off" class="rounded-md px-3 py-1 @error('name_category') border border-red-500 @enderror  text-black" value="{{ old('name_category') }}">
            @error('name_category')
                <p class="text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex flex-col space-y-3">
            <p>Photo</p>
            <label class="bg-white rounded-md @error('photo') border border-red-500 @enderror group px-3 py-1 w-1/2 flex flex-row justify-between cursor-pointer text-black relative">
                <p id="text">Select photo category</p>
                <i class="fas fa-download py-2 px-5 group-hover:bg-blue-700 transition duration-300 rounded-r text-white my-auto bg-blue-500 absolute right-0 top-0"></i>
                <input type="file" name="photo" class="hidden" id="files">
            </label>
            @error('photo')
                <p class="text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex flex-col space-y-3">
            <p>Description Category</p>
            <textarea name="description" rows="5" class="text-black rounded-md p-3 @error('description') border border-red-500 @enderror">{{ old('description') }}</textarea>
            @error('description')
                <p class="text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>
        
        <div class="flex flex-col py-5 space-y-2">
            <input type="submit" value="Create" class="p-2 px-5 w-1/2 mx-auto transform transition duration-300 hover:bg-blue-600 hover:scale-105 cursor-pointer bg-blue-500 rounded-md">
            <a href="{{ route('admin-category') }}" class="p-2 px-5 w-1/2 mx-auto transform transition duration-300 hover:bg-red-600 hover:scale-105 cursor-pointer rounded-md bg-red-500 text-center">Back</a>
        </div>
    </form>
</div>
@endsection