<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use \App\Models\Category;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
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
        if(Gate::allows('admin-authorized')) {
            return view('categories.add');
        }

        return back()->with('info', 'Unauthorized');
    }

    public function create(Request $request)
    {
        $request->validate(['name' => 'required']);

        $category = new Category;
        $category->name = $request->name;
        $category->save();

        return back();
    }

    public function show()
    {
        $categories = Category::all();
        return view('categories.show', ['categories' => $categories]);
    }

    public function delete($id)
    {
        $category = Category::find($id);
        if(Gate::allows('admin-authorized')) {
            $category->delete();
            return back()->with('info', 'One category deleted just now.');
        }

        return back()->with('info', 'Unauthorized');
    }

    public function edit($id)
    {
        if(Gate::allows('admin-authorized')) {
            $category = Category::find($id);
            return view('categories.edit', ['category' => $category]);
        }

        return back()->with('info', 'Unauthorized');
    }

    public function update($id, Request $request)
    {
        $request->validate(['name' => 'required']);

        $category = Category::find($id);
        $category->name = $request->name;
        $category->save();

        return redirect('/categories/show')->with('info', 'you updated one category');
    }
}
