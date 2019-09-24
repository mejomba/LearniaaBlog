<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;
use App\Category;
use App\Post;
use App\User;
use App\Profile;
use Auth;


class HomeController extends Controller
{
    public function index()
    {
        return view('admin.index');

    }
}
