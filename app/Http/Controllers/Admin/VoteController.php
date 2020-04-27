<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Rules\CheckTagExists;
use App\Vote;
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
     $vote->question = request()->question ;
     $vote->extras =  json_encode($req) ;
                                       
                                
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
                    'question' => 'required|String',  
                    'option1' => 'nullable|String', 
                    'option2' => 'nullable|String', 
                    'option3' => 'nullable|String', 
                    'option4' => 'nullable|String', 
                    //'shortcode' => 'required|String', 

                 ];

    $messages = [
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









}
