<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tree;
use App\Product;
use Validator;
use Illuminate\Support\Facades\Storage;

class TreeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index_Tree()
    {
        $nodes = Tree::get();
        $instance_Model_Tree =new Tree();
        $names = $instance_Model_Tree->GetListAllNameColumns_ForTable();
        return view('admin.tree.index', compact('names','nodes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create_Tree()
    {

        return view('admin.tree.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store_Tree(Request $request)
    {
        $validator =  $this->validation_Tree($request);

            if ($validator->fails())
            {
                return redirect()->back()
                            ->withErrors($validator)
                            ->withInput();
        }

        else
        {
                $tree = new Tree();
                $tree->pk_parent = 0 ;
                $tree->level = 0 ;
                $tree->sort =  request()->sort ;
                $tree->has_children = request()->has_children ;
                $tree->name = request()->name ;
                $tree->description = request()->description ;
                $tree->short_description = request()->short_description ;
              
                if(request()->pk_AllCourse_product) {$tree->pk_AllCourse_product = request()->pk_AllCourse_product ;}

                if(request()->pic)
                {
                  $pic = request()->file('pic');
                  $pic_name = $pic->getClientOriginalName();
                  $path = Storage::putFileAs( 'tree', $pic, $pic_name);
                  $tree->pic = $pic_name ;
                }

                if(request()->icon)
                {
                  $icon = request()->file('icon');
                  $icon_name = $pic->getClientOriginalName();
                  $path = Storage::putFileAs( 'tree', $icon, $icon_name);
                  $tree->icon = $icon_name ;
                }
                
                    if($tree->save())
                    {
                            return redirect(route('admin.tree.index'))->with('success','درخت با موفقیت ایجاد شد');
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
    public function show_Tree($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit_Tree($id)
    {
        $tree = Tree::find($id);
        return view('admin.tree.edit',compact('tree'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_Tree(Request $request, $id)
    {
        $validator =  $this->validation_Tree($request);

        if ($validator->fails())
        {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput();
        }

        else
        {
                $tree = Tree::find($id);
                $tree->sort =  request()->sort ;
                $tree->name = request()->name ;
                $tree->description = request()->description ;
                $tree->has_children =  request()->has_children ;
                $tree->short_description = request()->short_description ;

                if(request()->pk_AllCourse_product) {$tree->pk_AllCourse_product = request()->pk_AllCourse_product ;}

                if(request()->pic)
                {
                  $pic = request()->file('pic');
                  $pic_name = $pic->getClientOriginalName();
                  $path = Storage::putFileAs( 'tree', $pic, $pic_name);
                  $tree->pic = $pic_name ;
                }

                if(request()->icon)
                {
                  $icon = request()->file('icon');
                  $icon_name = $pic->getClientOriginalName();
                  $path = Storage::putFileAs( 'tree', $icon, $icon_name);
                  $tree->icon = $icon_name ;
                }

                    if($tree->save())
                    {
                            return redirect(route('admin.tree.index'))->with('success','درخت با موفقیت ویرایش شد');
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
    public function destroy_Tree($id)
    {
        $tree = Tree::find($id);

        if($tree->delete())
        {
            return redirect(route('admin.tree.index'))->with('success','درخت با موفقیت حذف شد ');
        }
        else
        {
            return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
        }
    }

    public function validation_Tree(Request $request)
    {

        $rules =  [ 
                    'name' => 'required|min:2', 
                    'description' => 'required|min:3',
                    'sort' => 'required', 
                 ];

             
    $messages = [
                'name.required' => ' نام  وارد نشده است',
                'name.min' => 'نام  کوتاه تر از حد مجاز است',
                'description.required' => ' توضیحات وارد نشده است ',
                'description.min' => ' توضیحات  کوتاه تر از حد مجاز است',
                'sort.required' => ' ترتیب  وارد نشده است',
                ];

        $validator = Validator::make($request->all(),$rules,$messages);

        return $validator ;
    }


    public function upload(Request $request)
    {
            if($request->hasFile('upload')) 
            {
               
              $pic = request()->file('upload');
              $pic_name = $pic->getClientOriginalName();
              $path = Storage::putFileAs( 'tree', $pic, $pic_name);
              $url2 = Storage::url('tree/'.$pic_name);
              $CKEditorFuncNum = $request->input('CKEditorFuncNum');
              $url =   $url2 ;   
              $msg = 'اپلود تصویر با موفقیت انجام شد';  
             @header('Content-type: text/html; charset=utf-8');

           return   $response = [
             "uploaded" => 1,
             "filename" =>  $pic_name,
             "url" => $url,
             "error" => $msg
             ];
          }
    }


  /* ------------------------------   Node Operations     ------------------------------------------- */  

  public function create_Node($tree_parent)
  {
     $products = Product::get();
     return view('admin.tree.node.create',compact('products','tree_parent'));
  }

  
  public function store_Node(Request $request)
  {
      $validator =  $this->validation_Node($request);

          if ($validator->fails())
          {
              return redirect()->back()
                          ->withErrors($validator)
                          ->withInput();
      }

      else
      {
             $row = Tree::where('pk_tree',request()->tree_parent)->first();
           
              $tree = new Tree();
              $tree->pk_parent = $row->pk_tree  ;
              $tree->level = $row->level + 1 ;
              $tree->sort =  request()->sort ;
              $tree->has_children = request()->has_children ;
              $tree->name = request()->name ;
              $tree->description = request()->description ;
              $tree->short_description = request()->short_description ;

              if(request()->pk_AllCourse_product) {$tree->pk_AllCourse_product = request()->pk_AllCourse_product ;}


              if(request()->pic)
              {
                $pic = request()->file('pic');
                $pic_name = $pic->getClientOriginalName();
                $path = Storage::putFileAs( 'tree', $pic, $pic_name);
                $tree->pic = $pic_name ;
              }

              if(request()->icon)
              {
                $icon = request()->file('icon');
                $icon_name = $pic->getClientOriginalName();
                $path = Storage::putFileAs( 'tree', $icon, $icon_name);
                $tree->icon = $icon_name ;
              }
             
                  if($tree->save())
                  {
                          return redirect(route('admin.tree.index'))->with('success','گره با موفقیت ایجاد شد');
                  }
                  else
                  {
                      return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
                  }

      }
  }



  public function edit_Node($id)
  {
      $tree = Tree::find($id);
      $products = Product::get();
      return view('admin.tree.node.edit',compact('tree','products'));
  }




  public function update_Node(Request $request, $id)
  {
      $validator =  $this->validation_Node($request);

      if ($validator->fails())
      {
          return redirect()->back()
                      ->withErrors($validator)
                      ->withInput();
      }

      else
      {
              $tree = Tree::find($id);
              $tree->sort =  request()->sort ;
              $tree->name = request()->name ;
              $tree->description = request()->description ;
              $tree->short_description = request()->short_description ;
              $tree->has_children = request()->has_children ;

              if(request()->pk_AllCourse_product) {$tree->pk_AllCourse_product = request()->pk_AllCourse_product ;}


              if(request()->pic)
              {
                $pic = request()->file('pic');
                $pic_name = $pic->getClientOriginalName();
                $path = Storage::putFileAs( 'tree', $pic, $pic_name);
                $tree->pic = $pic_name ;
              }

              if(request()->icon)
              {
                $icon = request()->file('icon');
                $icon_name = $pic->getClientOriginalName();
                $path = Storage::putFileAs( 'tree', $icon, $icon_name);
                $tree->icon = $icon_name ;
              }

                  if($tree->save())
                  {
                          return redirect(route('admin.tree.index'))->with('success','درخت با موفقیت ویرایش شد');
                  }
                  else
                  {
                      return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
                  }

      }
  }





  public function validation_Node(Request $request)
  {

      $rules =  [ 
                  'name' => 'required|min:2', 
                  'description' => 'required|min:3',
                  'sort' => 'required', 
                  'tree_parent' => 'required',
                  'has_children' => 'required',
               ];

           
  $messages = [
              'name.required' => ' نام  وارد نشده است',
              'name.min' => 'نام  کوتاه تر از حد مجاز است',
              'description.required' => ' توضیحات وارد نشده است ',
              'description.min' => ' توضیحات  کوتاه تر از حد مجاز است',
              'sort.required' => ' ترتیب  وارد نشده است',
              'tree_parent.required' => ' گره پدر  وارد نشده است',
              'has_children.required' => ' وضعیت فرزند  وارد نشده است',
              ];

      $validator = Validator::make($request->all(),$rules,$messages);

      return $validator ;
  }



}
