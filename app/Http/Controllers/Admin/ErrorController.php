<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use File;
use Auth;
use App\Errors;

class ErrorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* Security Admin Panel */
        if(Auth::user()->type != 'مدیر'){ return redirect()->back(); }
        /* Security Admin Panel */
             
        $errors = new Errors();
        $names =  $errors->GetListAllNameColumns_ForTable();
        $allerrors = Errors::orderby('pk_error','desc')->get();
        return view('admin.errors.index',compact('names','allerrors'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    public function download($name)
    {
        //
        return Response()->download(storage_path().'\logs\\'.$name);

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        //
        $now = Carbon::now();
        $path = "..\storage\logs\laravel-".$now->toDateString().".log";
        if(file_exists($path))
        {
        $read = File::get($path);
        //dd($read);
            return view('admin.errors.index',compact('read'));
        }
        else
        {
            return redirect(route('admin.errors.index'))->with('message','هیچ ارروری برای تاریخ امروز یافت نشد');
        }


    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $Errors = Errors::find($id);
        if($Errors->delete())
        {
            return redirect(route('admin.errors.index'))->with('success','ارورر با موفقیت حذف شد ');
        }
        else
        {
            return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
        }


    }
}
