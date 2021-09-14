<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Auth;

class IndexController extends Controller
{
    
    public function index(){
       return view('frontend.index');
    }

    public function logout(){
        Auth::logout();
        return redirect()->route('login');
    } 

    public function UserProfile(){
        $user=User::find(Auth::user()->id);
        dd($user->name);
    }
}
