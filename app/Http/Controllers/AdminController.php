<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Database\DatabaseManager;
use Illuminate\Support\Facades\DB;
use Stancl\Tenancy\Middleware\InitializeTenancyByDomain;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{

    public function index()
    {
        // dd(session()->all());
        return view('admin.home');
    }
}
