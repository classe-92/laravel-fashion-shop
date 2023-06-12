@extends('layouts.admin')

@section('content')
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Product List</h1>

        <a class="btn btn-success text-white" href="{{ route('admin.products.create') }}">New Product</a>

    </div>

    @if (session()->has('message'))
        <div class="alert alert-success">
            {{ session()->get('message') }}
        </div>
    @endif
    <table class="table">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Name</th>
                <th scope="col">Image</th>
                <th scope="col">Category</th>
                <th scope="col">Brand</th>
                <th scope="col">Texture</th>
                <th scope="col">Created</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($products as $product)
                <tr>
                    <th scope="row">{{ $product->id }}</th>
                    <td>{{ $product->name }}</td>
                    <td><img class="img-thumbnail" style="width:100px" src="{{ asset('storage/' . $product->cover_image) }}"
                            alt="{{ $product->name }}">
                    </td>
                    <td>
                        {{ $product->category ? $product->category->name : 'Senza categoria' }}
                    </td>
                    <td>
                        {{ $product->brand ? $product->brand->name : 'Senza Brand' }}
                    </td>
                    <td>
                        {{ $product->texture ? $product->texture->name : 'Senza texture' }}
                    </td>
                    <td>{{ $product->created_at }}</td>
                    <td>
                        <div class="d-flex justify-content-between align-items-center">
                            <a href="{{ route('admin.products.show', $product->slug) }}"
                                class="btn btn-primary text-white"><i class="fa-solid fa-eye"></i></a>
                            <a href="{{ route('admin.products.edit', $product->slug) }}"
                                class="btn btn-warning text-white"><i class="fa-solid fa-pencil"></i></a>
                            <form action="{{ route('admin.products.destroy', $product->slug) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type='submit' class="delete-button btn btn-danger text-white"
                                    data-item-title="{{ $product->name }}"> <i class="fa-solid fa-trash"></i></button>
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach
        </tbody>
    </table>
    {{ $products->links('vendor.pagination.bootstrap-5') }}
    @include('partials.modal-delete')
@endsection
