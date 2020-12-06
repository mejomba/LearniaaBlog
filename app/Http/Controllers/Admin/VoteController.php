<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rules\CheckTagExists;
use App\Vote;
use App\ReportVote;
use Validator;
use Auth;


class VoteController extends Controller
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
        $instance_Model_vote = new Vote();
        $names =   $instance_Model_vote->GetListAllNameColumns_ForTable();
        $votes = Vote::orderBy('pk_vote', 'desc')->get();
        return view('admin.vote.index',compact('votes','names'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        /* Security Admin Panel */
        if(Auth::user()->type != 'مدیر'){ return redirect()->back(); }
        /* Security Admin Panel */        
        return view('admin.vote.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      
        $validator =  $this->validation($request);

        if ($validator->fails())
           {
                return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
          }
    
        else
          {  
              $option1= "-";
              $option2= "-";
              $option3= "-";
              $option4= "-";

      if(request()->option1 != null){  $option1= request()->option1 ; }


      if(request()->option2 != null){ $option2= request()->option2 ;}


      if(request()->option3 != null){$option3= request()->option3 ;}

      
      if(request()->option4 != null){ $option4= request()->option4 ;}

      $req=array(
        [
          "option1" => request()->option1 ,
          "option2" => request()->option2,
          "option3" => request()->option3,
          "option4" => request()->option4
       ]

    );
                                                                               
    
     $vote = new Vote();
     $vote->name_vote = request()->name_vote ;
     $vote->question = request()->question ;
     $vote->extras =  json_encode($req) ;
     $vote->rewardname= request()->rewardname;                      
     $vote->reward= request()->reward;                      
     if($vote->save())
     {
      return redirect(route('admin.vote.index'))->with('success','نظرسنجی با موفقیت ایجاد شد');
     }
      else
       {
         return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
       }

                                    
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        /* Security Admin Panel */
        if(Auth::user()->type != 'مدیر'){ return redirect()->back(); }
        /* Security Admin Panel */        
        $vote = Vote::find($id);
    
        return view('admin.vote.edit',compact('vote'));
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
        $vote = Vote::find($id);

        $validator =  $this->validation($request);

        if ($validator->fails())
           {
                return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
          }
    
        else
          {  

            $option1= "-";
            $option2= "-";
            $option3= "-";
            $option4= "-";

    if(request()->option1 != null){  $option1= request()->option1 ; }


    if(request()->option2 != null){ $option2= request()->option2 ;}


    if(request()->option3 != null){$option3= request()->option3 ;}

    
    if(request()->option4 != null){ $option4= request()->option4 ;}

    $req=array(
      [
        "option1" => request()->option1 ,
        "option2" => request()->option2,
        "option3" => request()->option3,
        "option4" => request()->option4
     ]
    );
    $vote->rewardname= request()->rewardname;                      
    $vote->reward= request()->reward;                                            
    $vote->name_vote = request()->name_vote ; 
    $vote->question = request()->question ;
    $vote->extras =  json_encode($req) ;
              
            if($vote->save())
            {
                    return redirect(route('admin.vote.index'))->with('success','نظرسنجی با موفقیت ویرایش شد');
            }
            else
            {
                return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
            }

           }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $vote = Vote::find($id);
    
        if($vote->delete())
        {
            return redirect(route('admin.vote.index'))->with('success','نظرسنجی با موفقیت حذف شد ');
        }
        else
        {
            return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
        }
  
      }
    
       
    


    public function validation(Request $request)
    {

        $rules =  [
                    'name_vote' => 'required|String',
                    'question' => 'required|String',  
                    'option1' => 'required|String', 
                    'option2' => 'required|String', 
                    'option3' => 'nullable|String', 
                    'option4' => 'nullable|String', 
                    //'shortcode' => 'required|String', 

                 ];

    $messages = [
                'name_vote.required' => 'نام نظرسنجی  وارد نشده است',
                'name_vote.String' => 'نام نظرسنجی صحیح وارد نشده است',
        
                'question.required' => 'سوال نظرسنجی  وارد نشده است',
                'question.String' => 'سوال نظرسنجی صحیح وارد نشده است',

                'option1.String' => 'گزینه1 صحیح وارد نشده است',
                'option2.String' => 'گزینه2 صحیح وارد نشده است',
                'option3.String' => ' گزینه3 صحیح وارد نشده است',
                'option4.String' => 'گزینه4 صحیح وارد نشده است  ',

    

                ];

        $validator = Validator::make($request->all(),$rules,$messages);

        return $validator ;
    }


            public function showmore(Request $request,$id)
            {

                $vote_row = Vote::where('pk_vote',$id)->first();
             
                $name_vote  = $vote_row->name_vote ;
                $reportvotes_row = ReportVote::where('name_vote',$name_vote)->get();

                $A = 0 ; 
                $B = 0 ; 
                $C = 0 ; 
                $D = 0 ; 

              foreach( $reportvotes_row  as $row)
              {

                if($row->answer=='option1')
                {
                    $A = $A+1;
                }
                if($row->answer=='option2')
                {
                    $B = $B+1;
                }
                if($row->answer=='option3')
                {
                    $C = $C+1;
                }
                if($row->answer=='option4')
                {
                    $D = $D+1;
                }
            }
            $ResultOption1 = $A  ; 
            $ResultOption2 = $B; 
            $ResultOption3 = $C;
            $ResultOption4 =$D ; 

              return view('admin.vote.show',compact('ResultOption1','ResultOption2','ResultOption3','ResultOption4'));  
            
            
            }





}
