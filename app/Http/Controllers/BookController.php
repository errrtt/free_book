<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Book;
use Illuminate\Support\Facades\Gate;

class BookController extends Controller
{
    public function __construct()
    {
        $this->middleware(function($request, $next) {
            $user = auth()->user();
            if($user && $user->role_id != 2) {
                return redirect('/index')->with('info', 'Unauthorized');
            }

            return $next($request);
        });
    }

    public function add()
    {
        $categories = \App\Models\Category::all();
        return view('books.add', ['categories' => $categories]);
    }

    public function create(Request $request)
    {
        $request->validate([
            'image' => 'required',
            'file' => 'required',
            'title' => 'required',
            'author_name' => 'required',
            'category_id' => 'required',
        ]);

        $book = new Book;
        if(Gate::allows('admin-authorized')) {
            if (request()->hasFile('image')) {
                $image = request()->file('image');
                $imgName = time() . '.' . $image->getClientOriginalName();
                $book->image = $imgName;
                $image->storeAs('images', $imgName, 'public');
            }

            if (request()->hasFile('file')) {
                $file = request()->file('file');
                $fileName = time() . '.' . $file->getClientOriginalName();
                $file->storeAs('files', $fileName, 'public');
                $book->file = $fileName;
            }

            $book->title = request()->title;
            $book->author_name = request()->author_name;
            $book->category_id = request()->category_id;
            $book->save();

            return redirect('/index');
        }

        return back()->with('info', 'unauthorized');
    }

    public function show_books()
    {
        $books = Book::all();
        return view('books.show', ['books' => $books]);
    }

    public function delete($id)
    {
        if(Gate::allows('admin-authorized')) {
            $book = Book::find($id);
            $book->delete();
            return back()->with('info', 'You deleted one book data.');
        }

        return back()->with('info', 'Unauthorized');
    }

    public function edit($id)
    {
        if(Gate::allows('admin-authorized')) {
            $book = Book::find($id);
            $categories = \App\Models\Category::all();

            return view('books.edit', ['book' => $book, 'categories' => $categories]);
        }

        return back()->with('info', 'Unauthorized');
    }

    public function update($id)
    {
        $book = Book::find($id);
        $book->title = request()->title;
        if(request()->hasFile('image')) {
            $img = request()->file('image');
            $imgName = time() . '.' . $img->getClientOriginalName();
            $book->image = $imgName;
            $img->storeAs('images', $imgName, 'public');

        }else {

            $book->image = request()->origin_image;
        }

        if(request()->hasFile('file')) {
            $file = request()->file('file');
            $fileName = time() . '.' . $file->getClientOriginalName();
            $book->file = $fileName;
            $file->storeAs('files', $fileName, 'public');

        }else {
            $book->file = request()->origin_file;
        }

        $book->author_name = request()->author_name;
        $book->category_id = request()->category_id;
        $book->save();

        return redirect('/books');
    }
}
