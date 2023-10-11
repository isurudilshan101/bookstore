@extends('layout')

@section('content')

    <div class="container">
        @if (session('success'))
            <div class="alert alert-success">
                {{ session('success') }}
            </div>
        @endif

        @if(session('alert'))
            <div class="alert alert-danger">
                {{ session('alert') }}
            </div>
        @endif

        <div class="page_heading">
            <div class="view_heading">
                <h1 class="heading">Book Store</h1>
            </div>

            <div class="buttons">
                <div class="add_book">

                    <a href="{{ route('add_book_view') }}"><button type="button" class="btn btn-primary btn-sm">ADD BOOKS</button></a> 
     
                 </div>
     
                 <div class="return_book">
     
                     <a href="{{ route('return_books_view') }}"><button type="button" class="btn btn-primary btn-sm">RETURN BOOKS</button></a> 
      
                  </div>
            </div>          

        </div>
        <table class="table table-hover">
            <thead>
            <tr>
                <th scope="col">Book ID</th>
                <th scope="col">Title</th>
                <th scope="col">Author</th>
                <th scope="col">Price</th>           
                <th scope="col" style="padding-right: 50px;">Stock</th>
                <th scope="col">Action</th>
            </tr>
            </thead>
            <tbody>
                @foreach($books as $book)
                    <tr>
                        <th scope="row">{{ $book->id }}</th>
                        <td>{{ $book->title }}</td>
                        <td>{{ $book->author }}</td>
                        <td>{{ $book->price }}</td>
                        <td>{{ $book->stock }}</td>
                        <td>
                            <a href="{{ route('delete_book', $book->id) }}"><button type="button" class="btn btn-danger btn-sm"> DELETE </button></a>     
                            <a href="{{ route('edit_book',$book->id) }}"><button type="button" class="btn btn-primary btn-sm"> EDIT </button></a>  
                            <a href="{{ route('issue_book',$book->id) }}"><button type="button" class="btn btn-success btn-sm"> ISSUE </button></a>    

                        </td>
                    </tr>
            @endforeach
            
            </tbody>
        </table>
    </div>

    <script>

    </script>
@endsection