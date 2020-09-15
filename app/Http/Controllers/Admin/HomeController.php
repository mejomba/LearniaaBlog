<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;
use App\Category;
use App\Post;
use App\Package;
use App\User;
use App\Profile;
use Auth;


class HomeController extends Controller
{
    public function index()
    {
        /* Security Admin Panel */
        if(Auth::user()->type != 'Admin'){ return redirect()->back(); }
        /* Security Admin Panel */        
        $packages = Package::get();
        return view('admin.index',compact('packages'));   
    }  

}
