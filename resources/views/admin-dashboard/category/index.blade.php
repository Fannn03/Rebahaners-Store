@extends('templates.ad-index')
@section('content')
<div class="container border p-5 w-2/3 rounded-md mx-auto">
    <div class="flex flex-row justify-between border-b pb-3 px-3">
        <p class="text-xl text-white my-auto">Category List</p>
        <a href="{{ route('new-category') }}"
            class="p-3 flex flex-row bg-blue-500 duration-300 hover:scale-105 transform transition hover:bg-blue-700 text-white rounded-md">
            <i class="fas fa-plus my-auto border-r pr-2 border-gray-500"></i>
            <p class="ml-2">New Category</p>
        </a>
    </div>
    <div class="flex my-3 flex-row-reverse">
        <div class="w-1/2 flex flex-row-reverse px-5">
            <a href="{{ route('admin-dashboard') }}"
                class="bg-red-500 rounded-md px-5 w-1/4 text-center py-1 my-auto text-white">Back</a>
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
                    Code Category</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Name Category</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Total Products</th>
                <th
                    class="bg-gray-600 p-2 text-white font-bold md:border md:border-grey-500 text-left block md:table-cell">
                    Actions</th>
            </tr>
        </thead>
        <tbody class="block md:table-row-group overflow-y-auto">
            <?php $no = 1; ?>
            @foreach ($category as $ct)
            <tr
                class="@if($no % 2 == 0)bg-gray-300 @else bg-white @endif border border-grey-500 md:border-none block md:table-row">
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">{{ $no }}</td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">{{ $ct->code_category }}</td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">{{ $ct->name_category }}</td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">{{ $ct->product->count() }}</td>
                <td class="p-2 md:border md:border-grey-500 text-left block md:table-cell">
                    <a href="{{ url('/admin-dashboard/category/' . $ct->code_category) }}"
                        class="py-1 px-2 bg-blue-500 rounded text-white">Edit Data</a>
                    <a href="{{ url('/admin-dashboard/category/delete/'. $ct->code_category) }}"
                        onclick="return confirm('Are you sure?');"
                        class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-2 border border-red-500 rounded">Delete</a>
                </td>
            </tr>
            <?php $no++; ?>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
