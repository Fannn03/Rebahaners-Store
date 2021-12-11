@extends('templates.ad-index')
@section('content')
<div class="container border px-5 pt-5 w-1/2 rounded-md text-white mx-auto">
    <div class="block border-b border-white p-3">
        <p class="text-xl">Create New Product</p>
    </div>
    <form action="{{ route('new-product') }}" class="flex flex-col my-5 px-3 space-y-3" method="post">
        @csrf
        <div class="flex flex-col space-y-3">
            <p>Name Product</p>
            <input type="text" name="name_product" autofocus autocomplete="off" class="rounded-md px-3 py-1 @error('name_product') border border-red-500 @enderror  text-black" value="{{ old('name_product') }}">
            @error('name_product')
                <p class="text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex flex-col space-y-3">
            <p>Code Product</p>
            <input type="text" name="code_product" autofocus autocomplete="off" class="rounded-md px-3 py-1 @error('code_product') border border-red-500 @enderror  text-black" value="{{ old('code_product') }}">
            @error('code_product')
                <p class="text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex flex-col space-y-3">
            <p>Select Category</p>
            <select name="category_id" class="rounded-md px-3 py-1 @error('category_id') border border-red-500 @enderror text-black">
                    <option value="" selected>Select category product</option>
                @foreach ($category as $ct)
                    <option value="{{ $ct->id }}" class="text-black">{{ $ct->name_category }}</option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex flex-col space-y-3">
            <p>Price Product</p>
            <input type="text" name="price" autofocus autocomplete="off" class="rounded-md px-3 py-1 @error('price') border border-red-500 @enderror  text-black" value="{{ old('price') }}">
            @error('price')
                <p class="text-xs text-red-500">{{ $message }}</p>
            @enderror
        </div>
        <div class="flex flex-col py-5 space-y-2">
            <input type="submit" value="Create" class="p-2 px-5 w-1/2 mx-auto bg-blue-500 rounded-md">
            <a href="{{ route('admin-product') }}" class="p-2 px-5 w-1/2 mx-auto rounded-md bg-red-500 text-center">Back</a>
        </div>
    </form>
</div>
@endsection