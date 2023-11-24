<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Book;

class UserController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth')->except('index');
    }

    public function index()
    {
        $books = Book::all();
        return view('users.index', ['books' => $books]);
    }

    public function search(Request $request)
    {
        $search = $request->search;
        $books = Book::where('author_name', 'LIKE', "%$search%")
                        ->orWhere('title', 'LIKE', "%$search%")
                        ->get();
        return view('users.index', ['books' => $books, 'search' => $search]);
    }

    public function search_category(Request $request)
    {
        $search = $request->category_id;
        $books = Book::where('category_id', 'LIKE', "%$search%")->get();
        return view('users.index', ['books' => $books, 'search' => $search]);
    }
}
