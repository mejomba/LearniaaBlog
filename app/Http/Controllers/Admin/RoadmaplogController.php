<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\log;
use Auth;

class RoadmaplogController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        /* Security Admin Panel */
       if(Auth::user()->type != 'مدیر'){ return redirect()->back(); }
       /* Security Admin Panel */        
       $Model_log = new log();
       $names =   $Model_log->GetListAllNameColumns_ForTable();
       $logs = log::where('sort',1)->orderBy('pk_log', 'desc')->get();
       return view('admin.roadmaplog.index',compact('logs','names'));
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
    public function show($id)
    {
        //
        $logs = log::where(['uuid'=>$id,['sort','<>','1']])->orderby('pk_log','asc')->get();
        $Model_log = new log();
        $names =   $Model_log->columnnames();
        return view('admin.roadmaplog.show',compact('logs','names'));

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
    }
}
