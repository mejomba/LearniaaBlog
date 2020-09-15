<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Validator;
use App\Package;
use App\Section;
use Auth;

class SectionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        /* Security Admin Panel */
        if(Auth::user()->type != 'Admin'){ return redirect()->back(); }
        /* Security Admin Panel */        
        $instance_Model_blog = new Section();
        $names =   $instance_Model_blog->GetListAllNameColumns_ForTable();
        $sections = Section::orderBy('pk_section', 'ASC')->get();
        return view('admin.section.index',compact('sections','names'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $packages = Package::get();
        return view('admin.section.create',compact('packages'));
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
        $section = new Section();        
        $section->pk_package=request()->pk_package;
        $section->sort=request()->sort;
        $section->name=request()->name;
        $section->part_from=request()->part_from;
        $section->part_to=request()->part_to;
        $section->intro=request()->intro;
        
        if(  $section->save())
        {
            return redirect(route('admin.section.index' ))->with('success','سکشن با موفقیت ایجاد شد ');
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
        $section = Section::find($id);
        $packages = Package::get();
        return view('admin.section.edit',compact('section','packages')); 
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
        $section = Section::find($id);
        $section->pk_package=request()->pk_package;
        $section->sort=request()->sort;
        $section->name=request()->name;
        $section->part_from=request()->part_from;
        $section->part_to=request()->part_to;
        $section->intro=request()->intro;

        if($section->save())
        {
            return redirect(route('admin.section.index' ))->with('success','سکشن با موفقیت ویرایش شد ');
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
        $section = Section::find($id);
        if($section->delete())
        {
            return redirect(route('admin.section.index'))->with('success','سکشن با موفقیت حذف شد ');
        }
        else
        {
            return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
        }
    }

    public function validation(Request $request)
    {
     
        $rules =  [
                    'pk_package' => 'required', 
                    'sort' => 'required',
                    'name' => 'required',
                    'part_from' => 'required',
                    'part_to' => 'required',
                 ];

    $messages = [
                'pk_package.required' => 'کلید پکیج وارد نشده است',
                'sort.required' => 'ترتیب صحیح وارد نشده است ',
                'name.required' => 'نام  وارد نشده است',
                'part_from.required' => 'شروع سکشن وارد نشده است',
                'part_to.required' => 'انتهای سکشن وارد نشده است',
               ];

        $validator = Validator::make($request->all(),$rules,$messages);

        return $validator ;
    }
}
