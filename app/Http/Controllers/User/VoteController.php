<?php

namespace App\Http\Controllers\user;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Vote;
use App\ReportVote;
use auth;
use App\Profile;
use App\UserLog;
use Carbon\Carbon;
use Verta;
class VoteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    { if(auth::user())
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
        //
        $report = ReportVote::select('pk_vote')->where('pk_user',auth::user()->pk_users)->get();
        $votes = new Vote();
        $names = $votes->GetListAllNameColumns_ForTableforuser();
        $pk_vote=[];
        foreach($report as $i)
        {
            $pk_vote[]=$i->pk_vote;
        }
        $votes = Vote::wherenotin('pk_vote',$pk_vote)->orderby('pk_vote','desc')->get();
        return view('user.vote.index',compact('votes','names'));
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
    public function store($id,Request $request)
    {
        //
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
        $votename = vote::find($id);
        $setvote=new ReportVote();
        $setvote->pk_vote = $id;
        $setvote->pk_user = auth::user()->pk_users;
        $setvote->answer =request()->answer;
        
        if($setvote->save())
        {
            if($votename->rewardname=='افزایش موجودی کیف پول')
            {
                $user =profile::where('pk_users',auth::user()->pk_users)->first();
                $user->wallet = $user->wallet + $votename->reward;
                $user->save();
            }
            return redirect(route('user.vote.index'))->with('success','   نظر شما با موفقیت ثبت شد . جایزه ی شما : '.$votename->rewardname .':'. $votename->reward);
        }
        else
        {
            return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
        }    
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
        $report = ReportVote::where(['pk_vote'=>$id,'pk_user'=>auth::user()->pk_users])->first();
        if($report)
        {
        return redirect(route('user.vote.index'))->withErrors('شما قبلا در این نظزسنجی شرکت کرده اید');

        }else{
            $votes= vote::find($id);
            return view('user.vote.show',compact('votes'));
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
    }

    public function history()
    {
        //
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
        $report = ReportVote::select('pk_vote')->where('pk_user',auth::user()->pk_users)->get();
        $votes = new Vote();
        $names = $votes->GetListAllNameColumns_ForTableforuser();
        $pk_vote=[];

        foreach($report as $i)
        {
            $pk_vote[]=$i->pk_vote;
        }
        $votes = Vote::wherein('pk_vote',$pk_vote)->orderby('pk_vote','desc')->get();
        return view('user.vote.history',compact('votes','names'));
    }

    
}
