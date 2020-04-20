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
            $discount->codetakhfif = request()->codetakhfif ;
            $discount->limit = request()->limit ;
            $discount->Engheza =  request()->Engheza;
            $discount->minimom = request()->minimom ; 
            $discount->persent =  request()->persent ;
            $discount->maxpersent =  request()->maxpersent ;

            if($discount->save())
            {
                    return redirect(route('admin.discount.index'))->with('success','کد تخفیف با موفقیت ایجاد شد');
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
                    'codetakhfif' => 'required|String|min:5|max:5',  
                    'limit' => 'required|String', 
                    'Engheza' => 'required|String', 
                    'minimom' => 'required|String', 
                    'persent' => 'required|String', 
                    'maxpersent' => 'required|String', 

                    
                 ];

    $messages = [
                'serial.required' => 'کد تخفیف وارد نشده است',
                'serial.String' => ' کد صحیح وارد نشده است',
                'serial.min' => 'کد تخفیف وارد شده کمتر از حد مجاز است',
                'serial.max' => 'کد تخفیف وارد شده بیش از حد مجاز است است',

                'limit.required' => 'محدودیت در تعداد استفاده وارد نشده است',
                'limit.String' => 'محدودیت در تعداد استفاده  صحیح وارد نشده است',

                'Engheza.required' => 'تاریخ انقضا وارد نشده است',
                'Engheza.String' => 'تاریخ انقضا صحیح وارد نشده است',

                'minimom.required' => 'حداقل مبلغ خرید وارد نشده است',
                'minimom.String' => 'حداقل مبلغ خرید  صحیح وارد نشده است',

                'persent.required' => 'درصد تخفیف  وارد نشده است',
                'persent.String' => 'درصد تخفیف  صحیح وارد نشده است',

                'maxpersent.required' => 'حداکثر میزان تخفیف وارد نشده است',
                'maxpersent.String' => 'حداکثر میزان تخفیف  صحیح وارد نشده است',




                ];

        $validator = Validator::make($request->all(),$rules,$messages);

        return $validator ;
    }
}
