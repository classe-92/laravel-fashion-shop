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
    <form action="{{ route('admin.products.update', $product->slug) }}" method="POST" enctype="multipart/form-data">
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
            <div class="mb-3">
                <label for="body">Description</label>
                <textarea name="description" id="body" rows="10"
                    class="form-control @error('description') is-invalid @enderror">{{ old('description', $product->description) }}</textarea>
                @error('description')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror
            </div>
            <div class="form-group">
                <p>Seleziona i Colori:</p>
                {{-- @foreach ($tags as $tag)
                    <div>
                        @if ($errors->any())
                            <input type="checkbox" name="tags[]" value="{{ $tag->id }}" class="form-check-input"
                                {{ in_array($tag->id, old('tags', [])) ? 'checked' : '' }}>
                        @else
                            <input type="checkbox" name="tags[]" value="{{ $tag->id }}" class="form-check-input"
                                {{ $post->tags->contains($tag) ? 'checked' : '' }}>
                        @endif
                        <label for="" class="form-check-label">{{ $tag->name }}</label>
                    </div>
                @endforeach
                @error('tags')
                    <div class="invalid-feedback">{{ $message }}</div>
                @enderror --}}
            </div>
            <button type="submit" class="btn btn-success">Save</button>
            <button type="reset" class="btn btn-primary">Reset</button>
    </form>
    <script src="//js.nicedit.com/nicEdit-latest.js" type="text/javascript"></script>
    <script type="text/javascript">
        bkLib.onDomLoaded(nicEditors.allTextAreas);
    </script>
@endsection
