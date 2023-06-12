@extends('layouts.admin')

@section('content')
    <h1>{{ $product->name }}</h1>
    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <h6>Category: {{ $product->category ? $product->category->name : 'Senza categoria' }}</h6>
    <h6>Brand: {{ $product->brand ? $product->brand->name : 'Senza Brand' }}</h6>
    <h6>Category: {{ $product->texture ? $product->texture->name : 'Senza texture' }}</h6>
    <h6>Price: {{ $product->price }} &euro;</h6>
    <img src="{{ asset('storage/' . $product->cover_image) }}" alt="{{ $product->name }}">
    <p>{!! $product->description !!}</p>
    @if ($product->colors && count($product->colors) > 0)
        <div>
            @foreach ($product->colors as $color)
                <span class="badge rounded-pill" style="background-color: {{ $color->hex_value }}">{{ $color->name }}</span>
            @endforeach
        </div>
    @endif
@endsection
