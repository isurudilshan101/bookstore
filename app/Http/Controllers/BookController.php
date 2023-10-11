<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\IssueBook;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Validation\ValidationException;

class BookController extends Controller
{   
    // public function home_view(){
    //     return view('home');
    // }
    
    public function store(Request $request) {
  
        try {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'author' => 'required|string|max:255',
                'price' => 'required|numeric|min:0',
                'stock' => 'required|integer|min:0',
            ]);

            
            Book::create($validatedData);

            return redirect()->route('show_books')->with('success', 'Book Added successfully !');

        } catch (ValidationException $e) {
            
            return back()->withInput()->withErrors($e->errors());

        } catch (Exception $e) {
            
            return back()->withInput()->withErrors(['error' => 'An error occurred while creating the book.']);
        }
    }

    public function show() {
       
        $books = Book::all();  

        return view('home')->with('books', $books);
    }

    public function delete_book($id){
   
        $book = Book::findOrFail($id);  
            
        $book->delete();  
        return redirect()->route('show_books')->with('success', 'Book Deleted successfully !');          
    }

     public function edit_book($id) {
      
        $book = Book::findOrFail($id);
        
        return view('edit_book_details', compact('book'));
    }

    public function update_book(Request $request, $id){

        try {
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'author' => 'required|string|max:255',
                'price' => 'required|numeric|min:0',
                'stock' => 'required|integer|min:0',
            ]);

            $book = Book::findOrFail($id);

            $book->update($validatedData);

            return redirect()->route('show_books')->with('success', 'Book updated successfully!');
            
        } catch (ValidationException $e) {
            
            return back()->withInput()->withErrors($e->errors());

        } catch (Exception $e) {
            
            return back()->withInput()->withErrors(['error' => 'An error occurred while creating the book.']);
        }
    }

    public function issue_book(Request $request, $id){

        $book = Book::findOrFail($id);

        if ($book->stock == 0) {
            return redirect()->route('show_books')->with('alert', 'Stock is empty for this book');
        } else {

            return view('issue_book', compact('book'));
        }  
    }        
    
    public function issue_books_store(Request $request, $book_id){
         
        $validatedData = $request->validate([
            'book_id' => 'required|numeric',
            'user_id' => 'required|numeric',
            'user_name' => 'required|string|max:255',
            'issue' => 'required|in:0,1'   
        ]);

        $book = Book::findOrFail($book_id);
        //dd($book->stock);

        if ($book->stock == 0) {
            return redirect()->route('show_books')->with('alert', 'Stock is empty for this book');
        } else {
            IssueBook::create($validatedData);
            $current_stock = $book->stock - 1;
            $book->update(['stock' => $current_stock]);
            return redirect()->route('show_books')->with('success', 'Book Issued successfully');
        }
    } 
   
    public function return_books_view(){
        return view('return_book');
    }

    public function issue_books_return(Request $request){
       
        $book_id=$request->book_id;
        $user_id=$request->user_id;
        $return=$request->issue;

       $issue_book_detail = IssueBook::where('user_id', $user_id)
                            ->where('book_id', $book_id)
                            ->first();  

        $book = Book::findOrFail($book_id);
        $current_stock=$book->stock+1;
       
        $book->update(['stock' => $current_stock]);
        //dd($current_stock ); 
        return redirect()->route('show_books')->with('success', 'Book Returned successfully !');
   
    }
}