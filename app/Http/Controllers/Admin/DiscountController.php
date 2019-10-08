<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Discount;
use Validator;
use Auth;

class DiscountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $discounts = Discount::get();
        $instance_Model_discount =new Discount();
        $names = $instance_Model_discount->GetListAllNameColumns_ForTable();
        return view('admin.discount.index', compact('names','discounts'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.discount.create');
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
            $discount = new Discount();
            $discount->serial = request()->serial ;
            $discount->status = request()->status ;
            $owners =  explode("-",request()->owners);
            $data_owners = json_encode($owners,false); 
            $discount->owners = $data_owners ;
    
    
            if($discount->save())
            {
                    return redirect(route('admin.discount.index'))->with('success','بن تخفیف با موفقیت ایجاد شد');
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
        $discount = Discount::find($id);
        return view('admin.discount.edit',compact('discount'));
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
            $discount = Discount::find($id);
            $discount->serial = request()->serial ;
            $discount->status = request()->status ;
            $owners =  explode("-",request()->owners);
            $data_owners = json_encode($owners,false); 
            $discount->owners = $data_owners ;
    
    
            if($discount->save())
            {
                    return redirect(route('admin.discount.index'))->with('success','بن تخفیف با موفقیت ویرایش شد');
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
        $discount = Discount::find($id);
    
        if($discount->delete())
        {
            return redirect(route('admin.discount.index'))->with('success','بن تخفیف با موفقیت حذف شد ');
        }
        else
        {
            return redirect()->back()->with('report',' خطا : مشکل درعملیات پایگاه داده');
        }
    }

    public function validation(Request $request)
    {

        $rules =  [
                    'serial' => 'required|String',  
                    'status' => 'required|String', 
                    'owners' => 'required|String', 
               
                 ];

    $messages = [
                'serial.required' => 'سریال کد وارد نشده است',
                'serial.String' => 'سریال کد صحیح وارد نشده است',

                'status.required' => 'وضعیت  وارد نشده است',
                'status.String' => 'وضعیت  صحیح وارد نشده است',

                'owners.required' => 'مالکین  وارد نشده است',
                'owners.String' => 'مالکین  صحیح وارد نشده است',


                ];

        $validator = Validator::make($request->all(),$rules,$messages);

        return $validator ;
    }
}
