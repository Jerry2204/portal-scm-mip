<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index() {
        if(Auth::user()->role->nama_role == 'user') {
            return redirect()->route('scm.dashboard');
        }

        if(Auth::user()->role->nama_role == 'admin') {
            return redirect()->route('admin.users');
        }
    }

    public function dashboard() {
        return view('dashboard');
    }
}
