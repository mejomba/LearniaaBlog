<?php

namespace App\Http\Controllers\User;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class LearnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $learner = Learner::find($id);
      
      //  $users = User::get();

        $users =  Auth::user() ;

        return view('user.learner.edit',compact('users','learner'));  
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
            // Get Selected Item Fron DB  
            $learner = Learner::find($id);

             $learner->desc = request()->desc ;
             $learner->job = request()->job ;
     
             if(request()->pic)
             {
                $pic = request()->file('pic');
                $pic_name = $pic->getClientOriginalName();
                $path = Storage::putFileAs( 'learner', $pic, $pic_name);
                $learner->pic = $pic_name ;
            }  
     

             if($learner->save())
             {
                return redirect(route('user.home'))->with('success','مدرس با موفقیت ویرایش شد');
                
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
        //
    }
}
