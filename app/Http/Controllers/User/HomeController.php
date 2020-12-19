<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\UserLog;
use Carbon\Carbon;
use Verta;
use auth;
class HomeController extends Controller
{
    
    public function index()
    {
        if(auth::user())
        {
            $userlog = new UserLog();
            $userlog->pk_user=auth::user()->pk_users;
            $userlog->url=url()->current();
            $date = new Verta();
            $date->timezone = 'Asia/Tehran';
            $time = Carbon::now('IRAN')->format('g:i A');
            $userlog->date=$date->format('y/m/d');
            $userlog->time=$time;
            $userlog->save();

        }
        return view('user.index');
    }

    public function dashboard()
    {
        return view('user.dashboard');
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        //
    }

    public function update(Request $request, $id)
    {
        //
    }

    public function destroy($id)
    {
        //
    }
}
