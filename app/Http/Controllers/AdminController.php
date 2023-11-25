<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class AdminController extends Controller
{
    public function __construct()
    {
        $this->middleware(function($request, $next) {
            $user = auth()->user();

            if($user && $user->role_id != 2) {
                return back()->with('info', 'Unauthorized');
            }

            return $next($request);
        });
    }

    public function show_user()
    {
        $users = \App\Models\User::all();
        return view('admin.index', ['users' => $users]);
    }

    public function delete($id)
    {
        $user = \App\Models\User::find($id);
        if(Gate::allows('admin-authorized')) {
            $user->delete();
            return back()->with('info', 'One user deleted just now.');
        }

        return back()->with('info', 'unauthorized');
    }
}
