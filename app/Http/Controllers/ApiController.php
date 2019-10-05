<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Category;

class ApiController extends Controller
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


    public function validation($request)
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

        $validator = Validator::make($request,$rules,$messages);

        return $validator ;
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function Category_store(Request $request)
    {
     
            $category = new Category();
            $category->type = $_POST['type']  ;
            $category->name = $_POST['name']  ;
            $category->desc = $_POST['desc']  ;
           

                if($category->save())
                {
                    $response = [
                        'success' => true,
                        'data'    => '',
                        'message' => 'success',
                     ];

                     return $response;
                }
                else
                {
                    $response = [
                        'success' => false,
                        'data'    => '',
                        'message' => 'Error Insert & Database',
                     ];

                     return $response;
                }

    }
       

      

        /*
            $person = array('a','a');
            return $person ;

        */
        
    

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
}
