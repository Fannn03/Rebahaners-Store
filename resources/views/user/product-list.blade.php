@extends('templates.home')
@section('content')
    <div class="text-white">
        @foreach ($product as $pd)
        <p>nama product : {{ $pd->name_product }}</p>
        @endforeach
    </div>
@endsection