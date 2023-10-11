@extends('layout')  

@section('content')
    <div class="container">

        <h1 class="heading">Edit Book Details</h1>
        <form method="POST" action="{{ route('update_book', $book->id) }}">
           
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Title</label>
                <input type="text" class="form-control w-50" id="title" name="title" value="{{ $book->title }}" required  >
            </div>

            <div class="mb-3">
                <label for="author" class="form-label">Author</label>
                <input type="text" class="form-control w-50" id="author" name="author" value="{{ $book->author }}" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">Price</label>
                <input type="number" step="0.01" class="form-control w-50" id="price" name="price" value="{{ $book->price }}" required>
                
                @error('price')
                <div class="alert alert-danger error_message">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="stock" class="form-label">Stock</label>
                <input type="number" class="form-control w-50" id="stock" name="stock" value="{{ $book->stock }}" required>
                @error('stock')
                    <div class="alert alert-danger error_message">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Update Details</button>
        </form>
    </div>
@endsection
