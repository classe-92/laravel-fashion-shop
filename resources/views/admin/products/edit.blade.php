@extends('layouts.admin')

@section('content')
    <h1>Edit Product: {{ $product->name }}</h1>
    {{-- @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif --}}
    <form action="{{ route('admin.products.update', $product->slug) }}" method="POST" enctype="multipart/form-data"
        class="pb-4">
        @csrf
        @method('PUT')
        <div class="mb-3">
            <label for="title">Title</label>
            <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" id="name"
                required maxlength="150" minlength="3" value="{{ old('name', $product->name) }}">
            @error('name')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="d-flex">
            <div class="media me-4">
                <img id="uploadPreview" class="shadow" width="150"
                    src="{{ $product->cover_image ? asset('storage/' . $product->cover_image) : 'https://via.placeholder.com/300x200' }}"
                    alt="{{ $product->name }}">
            </div>
            <div class="mb-3">
                <label for="cover_image">Image</label>
                <input type="file" class="form-control @error('cover_image') is-invalid @enderror" name="cover_image"
                    id="cover_image" maxlength="255" value="{{ old('cover_image', $product->cover_image) }}">
                @error('cover_image')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
        </div>

        <div class="mb-3">
            <label for="category_id">Category</label>
            <select name="category_id" id="category_id" class="form-control @error('category_id') is-invalid @enderror">
                <option value="">Seleziona categoria</option>
                @foreach ($categories as $category)
                    <option value="{{ $category->id }}"
                        {{ $category->id == old('category_id', $product->category_id) ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="brand_id">Brand</label>
            <select name="brand_id" id="brand_id" class="form-control @error('brand_id') is-invalid @enderror">
                <option value="">Seleziona brand</option>
                @foreach ($brands as $brand)
                    <option value="{{ $brand->id }}"
                        {{ $brand->id == old('brand_id', $product->brand_id) ? 'selected' : '' }}>{{ $brand->name }}
                    </option>
                @endforeach
            </select>
            @error('brand_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>
        <div class="mb-3">
            <label for="texture_id">Texture</label>
            <select name="texture_id" id="texture_id" class="form-control @error('texture_id') is-invalid @enderror">
                <option value="">Seleziona texture</option>
                @foreach ($textures as $texture)
                    <option value="{{ $texture->id }}"
                        {{ $texture->id == old('texture_id', $product->texture_id) ? 'selected' : '' }}>
                        {{ $texture->name }}</option>
                @endforeach
            </select>
            @error('texture_id')
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
            <div class="mb-3">
                <label for="body">Description</label>
                <textarea name="description" id="body" rows="10"
                    class="form-control @error('description') is-invalid @enderror">{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="mb-3">
                <label for="price" class="form-label">Price &euro;</label>
                <input type="number" step="0.01" value="{{ $product->price }}"
                    class="form-control @error('price') is-invalid @enderror" id="price" name="price" min="0.01"
                    max="9999.99">

                @error('price')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <p>Seleziona i Colori:</p>
                <div class="d-flex flex-wrap align-items-center w-100 py-4">

                    @foreach ($colors as $color)
                        <div
                            style="background-color: {{ $color->hex_value }}; width:250px; margin:5px; padding:5px; color:white">
                            @if ($errors->any())
                                <input type="checkbox" name="colors[]" value="{{ $color->id }}" class="form-check-input"
                                    {{ in_array($color->id, old('colors', [])) ? 'checked' : '' }}>
                            @else
                                <input type="checkbox" name="colors[]" value="{{ $color->id }}" class="form-check-input"
                                    {{ $product->colors->contains($color) ? 'checked' : '' }}>
                            @endif

                            <label for="" class="form-check-label">{{ $color->name }}</label>
                        </div>
                    @endforeach
                </div>
                @error('colors')
                    <div class="invalid-feedback">{{ $message }}
                    </div>
                @enderror
            </div>
        </div>
        <button type="submit" class="btn btn-success">Save</button>
        <button type="reset" class="btn btn-primary">Reset</button>
    </form>
    <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">
        bkLib.onDomLoaded(nicEditors.allTextAreas);
    </script>
@endsection
