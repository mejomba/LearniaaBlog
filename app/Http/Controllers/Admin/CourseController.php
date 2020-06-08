<?php

namespace App\Http\Controllers\admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;
use App\Course;
use App\Product;
use App\Tree;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $instance_Model_course = new Course();
        $names =   $instance_Model_course->GetListAllNameColumns_ForTable();
        $courses = Course::orderBy('pk_course')->get();
        /*foreach ($courses as $course) {
            $products = product::where('pk_product',json_decode($course['pk_product']))->get();
            $trees = tree::select('name')->where('pk_tree',json_decode($course['pk_tree']))->get();
        }*/
        
        return view('admin.course.index',compact('courses','names')); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $products = product::get();
        $trees = tree::get();
        return view('admin.course.create',compact('products','trees'));       

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

        $newcourse = new Course();
        //dd(request()->tree);
        $newcourse->pk_tree = request()->tree;
        $newcourse->pk_product = request()->product;
        $newcourse->sort = request()->sort;
        $newcourse->name = request()->name;
        $newcourse->description = request()->description;
        if(request()->pic)
         {
                $pic = request()->file('pic');
                $pic_name = $pic->getClientOriginalName();
                $path = Storage::putFileAs( 'post', $pic, $pic_name);
                $newcourse->pic = $pic_name ;
         }
        if($newcourse->save())
        {
            return redirect(route('admin.course.index'))->with('success','درس با موفقیت ایجاد شد ');
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
        $course = Course::find($id);
        $products = product::get();
        $trees = tree::get();
        $product = product::select('title')->where('pk_product',$course->pk_product)->first();
        $tree = tree::select('name')->where('pk_tree',$course->pk_tree)->first();
        return view('admin.course.edit',compact('course','product','products','trees','tree'));       

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
        $newcourse = Course::find($id);
        //$product = product::select('pk_product')->where('title',request()->product)->first();
        //$tree = tree::select('pk_tree')->where('name',request()->tree)->first();
       // dd(request()->tree);
        $newcourse->pk_tree = request()->tree;
        $newcourse->pk_product = request()->product;
        $newcourse->sort = request()->sort;
        $newcourse->name = request()->name;
        $newcourse->description = request()->description;
        if(request()->pic)
        {
               $pic = request()->file('pic');
               $pic_name = $pic->getClientOriginalName();
               $path = Storage::putFileAs( 'post', $pic, $pic_name);
               $newcourse->pic = $pic_name ;
        }
        if($newcourse->save())
        {
            return redirect(route('admin.course.index'))->with('success','درس با موفقیت ویرایش شد ');
        }
        else
        {
            return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
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
        $Course = Course::find($id);
    
        if($Course->delete())
        {
            return redirect(route('admin.course.index'))->with('success','درس با موفقیت حذف شد ');
        }
        else
        {
            return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
        }
    }
}
