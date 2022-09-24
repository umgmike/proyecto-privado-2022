<?php

namespace App\Http\Controllers\AEROPUERTO_AURORA;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function HomeAdmin()
    {
        return view('theme.pages.dashboard.dashboard');
    }
}
