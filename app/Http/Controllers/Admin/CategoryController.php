<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Category;
use Validator;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();
        $instance_Model_category =new Category();
        $names = $instance_Model_category->GetListAllNameColumns_ForTable();
        return view('admin.category.index', compact('names','categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.category.create');
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
            
                $category = new Category();
                $category->type = request()->type ;
                $category->name = request()->name ;
                $category->desc = request()->desc ;
               

                    if($category->save())
                    {
                            return redirect(route('admin.category.index'))->with('success','دسته بندی با موفقیت ایجاد شد');
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
        $category = Category::find($id);
        return view('admin.category.edit',compact('category'));
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
                
                     $category = Category::find($id);
                    $category->type = request()->type ;
                    $category->name = request()->name ;
                    $category->desc = request()->desc ;
                  

                        if($category->save())
                        {
                                return redirect(route('admin.category.index'))->with('success','دسته بندی با موفقیت ویرایش شد');
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
        $category = Category::find($id);

        if($category->delete())
        {
            return redirect(route('admin.category.index'))->with('success','دسته بندی با موفقیت حذف شد ');
        }
        else
        {
            return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
        }

    }
    public function validation(Request $request)
    {

        $rules =  [
                    'type' => 'required|String', 
                    'name' => 'required|min:3', 
                    'desc' => 'required|min:3|max:500',
                 ];

             
    $messages = [
                'type.required' => 'نوع  وارد نشده است',
                'type.String' => ' نوع صحیح وارد نشده است',
                'name.required' => ' نام  وارد نشده است',
                'name.min' => 'نام  کوتاه تر از حد مجاز است',
                'desc.required' => ' توضیحات وارد نشده است ',
                'desc.min' => ' توضیحات  کوتاه تر از حد مجاز است',
                'desc.max' => 'توضیحات  بیشتر تر از حد مجاز است ',

            
                ];

        $validator = Validator::make($request->all(),$rules,$messages);

        return $validator ;
    }


   
    


}
