<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Validator;
use Auth;
use App\Category;

class ApiController extends Controller
{
   

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
       

}
