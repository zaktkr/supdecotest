<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackendController extends Controller
{

    public function __construct()
    {
        $this -> middleware('auth');
    }
    public function login()
    {
        return view('backend.login');
    }

    public function index()
    {
        
        return view('backend.index');
    }
}
