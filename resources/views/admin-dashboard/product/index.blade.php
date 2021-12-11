@extends('templates.ad-index')
@section('content')
<div class="container border p-5 w-2/3 rounded-md mx-auto">
    <div class="flex flex-row justify-between border-b pb-3 px-3">
        <p class="text-xl text-white my-auto">Product List</p>
        <a href="{{ route('new-product') }}"
            class="p-3 flex flex-row bg-blue-500 duration-300 hover:scale-105 transform transition hover:bg-blue-700 text-white rounded-md">
            <i class="fas fa-plus my-auto border-r pr-2 border-gray-500"></i>
            <p class="ml-2">New Product</p>
        </a>
    </div>
    <div class="flex flex-row my-3 justify-between">
        <form action="{{ route('admin-product') }}" method="get" role="search" class="flex flex-row space-x-3">
            <p class="text-white my-auto">Search :</p>
            <div class="flex flex-row relative">
                <input type="text" autocomplete="off" name="s" value="{{ request('s') }}" autofocus class="rounded px-3 py-1">
                <button type="button" class="text-white absolute right-0 bg-blue-500 rounded-r px-3 py-1">
                    <i class="fas fa-search"></i>
                </button>
            </div>
        </form>
        <div class="w-1/2 flex flex-row-reverse px-5">
            <a href="{{ route('admin-dashboard') }}" class="bg-red-500 rounded-md px-5 w-1/4 text-center py-1 my-auto text-white">Back</a>
        </div>
    </div>
    <!-- component -->
    <table class="min-w-full border-collapse block md:table mt-2">
        <thead class="block md:table-header-group">
            <tr
                class="border border-grey-500 md:border-none block md:table-row absolute -top-full md:top-auto -left-full md:left-auto  md:relative ">
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    No</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Name Category</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Code Product</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Name Product</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Price</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Actions</th>
            </tr>
        </thead>
        <tbody class="block md:table-row-group overflow-y-auto">
            <?php $no = 1; ?>
            @foreach ($product as $index => $ct)
            <tr class="@if($no % 2 == 0)bg-gray-300 @else bg-gray-800 text-white @endif border border-grey-500 md:border-none block md:table-row">    
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">{{ $index + $product->firstItem() }}</td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">{{ $ct->category->name_category }}</td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">{{ $ct->code_product }}</td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">{{ $ct->name_product }}</td>
                <td class="p-2 md:border md:border-grey-500 text-left text-green-500 block md:table-cell"><b>{{ number_format($ct->price) }}</b></td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                    <a href="{{ url('/admin-dashboard/product/' . $ct->code_product) }}" class="py-1 px-2 bg-blue-500 rounded text-white">Edit Data</a>
                    <a href="{{ url('/admin-dashboard/product/delete/'. $ct->code_product) }}" onclick="return confirm('Are you sure?');" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">Delete</a>
                </td>
            </tr>
            <?php $no++; ?>
            @endforeach
        </tbody>
    </table>
    <div class="my-3">
        {{ $product->links('vendor.pagination.tailwind') }}
    </div>
</div>
@endsection
