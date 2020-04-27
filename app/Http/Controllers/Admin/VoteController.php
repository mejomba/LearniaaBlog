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
        $user =  Auth::user() ;

        if($user->type == 'مدیر')
        {
            $vote_data = Vote::orderBy('question', 'option1','option2','option3','option4')->get();
        }
        else
        {
          //$tags = Tag::where('pk_users',$user->pk_users)->orderBy('pk_tags', 'desc')->get();
        }

        
        $instance_Model_tag =new Tag();
        $names = $instance_Model_tag->GetListAllNameColumns_ForTable();
        return view('admin.tag.index', compact('names','vote_data'));
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
        if ($validator->fails())
           {
                return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
          }
    
        else
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
                                        $vote = new Vote();
                                        $vote->question = request()->question ;
                                        $vote->option1 = request()->option1 ;
                                        $vote->option2 = request()->option2 ;
                                        $vote->option3 = request()->option3 ;
                                        $vote->option4 = request()->option4 ;

                                       
                                
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
        $validator =  $this->validation($request);

        if ($validator->fails())
           {
                return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
          }
    
        else
          {  
            $vote = Vote::find($id);
            $vote->question = request()->question ;
            $vote->option1 = request()->option1 ;
            $vote->option2 = request()->option2 ;
            $vote->option3 = request()->option3 ;         
            $vote->option4 = request()->option4 ;
    
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
    
        if($Vote->delete())
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
                    'option1' => 'required|String', 
                    'option2' => 'required|String', 
                    'option3' => 'required|String', 
                    'option4' => 'required|String', 
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
