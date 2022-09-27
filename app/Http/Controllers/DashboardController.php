<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\User;
use Session;
use Auth;
class DashboardController extends Controller
{
    public function index(){
        return view('dashboard');
    }

    public function logout() {
        Session::flush();
        Auth::logout();
        return Redirect('login');
    }
}
