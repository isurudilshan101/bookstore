@extends('layout')  

@section('content')
   
       <div class="container">
        <h1 class="heading">Issue Book</h1>
        <form method="POST" action="{{ route('issue_books_store',$book->id) }}">
            
            @csrf

            <div class="mb-3">
                <label for="title" class="form-label">Book ID</label>
                <input type="text" class="form-control w-50" id="book_id" name="book_id" value="{{ $book->id  }}" required  >
            </div>


            <div class="mb-3">
                <label for="price" class="form-label">User ID</label>
                <input type="text" step="0.01" class="form-control w-50" id="user_id" name="user_id" required>
            </div>

            <div class="mb-3">
                <label for="price" class="form-label">User Name</label>
                <input type="text" step="0.01" class="form-control w-50" id="user_name" name="user_name" required>
            </div>

            <div class="mb-3">
                <label for="select_issue" class="form-label">Select Issue</label>
                <select class="form-control w-50 mb-4" id="issue" name="issue" required>
                  <option value="1">Issue</option>
                  <option value="0">Return</option> 
                </select>
            </div>

            <button type="submit" class="btn btn-primary">Issue Book</button>
        </form>
    </div>

@endsection