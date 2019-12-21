<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tag;
use Validator;
use Auth;

class TagController extends Controller
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
            $tags = Tag::get();
        }
        else
        {
          $tags = Tag::where('pk_users',$user->pk_users)->get();
        }

        
        $instance_Model_tag =new Tag();
        $names = $instance_Model_tag->GetListAllNameColumns_ForTable();
        return view('admin.tag.index', compact('names','tags'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.tag.create');

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
                    $tag = new Tag();
                    $tag->fa_name = request()->fa_name ;
                    $tag->en_name = request()->en_name ;
                    $tag->type = request()->type ;

                    $user =  Auth::user() ;
                    $tag->pk_users =  $user->pk_users ;
            
            
                    if($tag->save())
                    {
                            return redirect(route('admin.tag.index'))->with('success','تگ با موفقیت ایجاد شد');
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
        $tag = Tag::find($id);
        return view('admin.tag.edit',compact('tag'));
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
            $tag = Tag::find($id);
            $tag->fa_name = request()->fa_name ;
            $tag->en_name = request()->en_name ;
            $tag->type = request()->type ;
      
    
            if($tag->save())
            {
                    return redirect(route('admin.tag.index'))->with('success','تگ با موفقیت ویرایش شد');
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
        $Tag = Tag::find($id);
    
        if($Tag->delete())
        {
            return redirect(route('admin.tag.index'))->with('success','تگ با موفقیت حذف شد ');
        }
        else
        {
            return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
        }
  
      }
    
       
    


    public function validation(Request $request)
    {

        $rules =  [
                    'fa_name' => 'required|String',  
                    'en_name' => 'nullable|String', 
                    'type' => 'required|String', 
               
                 ];

    $messages = [
                'fa_name.required' => 'نام فارسی وارد نشده است',
                'fa_name.String' => 'نام فارسی صحیح وارد نشده است',

              
                'en_name.String' => 'نام انگلیسی صحیح وارد نشده است',

                'type.required' => 'نوع  وارد نشده است',
                'type.String' => 'نوع  صحیح وارد نشده است',


                ];

        $validator = Validator::make($request->all(),$rules,$messages);

        return $validator ;
    }
}
