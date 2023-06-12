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
    <img src="{{ asset('storage/' . $product->cover_image) }}" alt="{{ $product->name }}">
    <p>{!! $product->description !!}</p>
    {{-- @if ($post->tags && count($post->tags) > 0)
        <div>
            @foreach ($post->tags as $tag)
                <a href="{{ route('admin.tags.show', $tag->slug) }}"
                    class="badge rounded-pill text-bg-info">{{ $tag->name }}</a>
            @endforeach
        </div>
    @endif --}}
@endsection
