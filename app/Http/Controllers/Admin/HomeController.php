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
        if(Auth::user()->type != 'مدیر'){ return redirect()->back(); }
        /* Security Admin Panel */        
        $packages = Package::get();
        return view('admin.index',compact('packages'));   
    }  
    public function list()
    {
        
        $packages = Package::get();
        return response()->json(['packages' => $packages]);   
        
        
        /* Security Admin Panel */
        /* Security Admin Panel */        
       
    }  
    

    public function Page500()
    {
        return view('error.500')->with('report','ارور');
    }

}
