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
        /* Security Admin Panel */
        if(Auth::user()->type != 'Admin'){ return redirect()->back(); }
        /* Security Admin Panel */        
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
            $discount->discount_code = request()->discount_code ;
            $discount->type = request()->type ;

            if(request()->type == 'عمومی')
            {
                $discount->pk_package = 0 ;
            }
            else
            {
                $discount->pk_package = request()->pk_package ;
            }

            $discount->date_Expire =  request()->date_Expire;
            $discount->minimum_buy = request()->minimum_buy ; 
            if(request()->limit)
            { 
                $discount->limit = request()->limit ;
            }
            $discount->percent_discount =  request()->percent_discount ;
            $discount->maxdiscount =  request()->maxdiscount ;
            $discount->status =  request()->status ;
         
            if(request()->pk_package == null)
            {
                $discount->type =  'عمومی' ;

            }else{
                $discount->pk_package =  request()->pk_package ;
                $discount->type =  'محصول محور' ;

            }

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
    public function edit($pk_discount)
    {
        $discount = Discount::find($pk_discount);
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
    
            $discount->discount_code = request()->discount_code ;
            $discount->type = request()->type ;
            
            if(request()->type == 'عمومی')
            {
                $discount->pk_package = 0 ;
            }
            else
            {
                $discount->pk_package = request()->pk_package ;
            }

            $discount->date_Expire =  request()->date_Expire;
            $discount->minimum_buy = request()->minimum_buy ; 
          
            if(request()->limit) 
            { 
                $discount->limit = request()->limit ;
            }
            
            $discount->percent_discount =  request()->percent_discount ;
            $discount->maxdiscount =  request()->maxdiscount ;
            $discount->status =  request()->status ;
            
            if(request()->pk_package == null)
            {
                $discount->type =  'عمومی' ;

            }else{
                $discount->pk_package =  request()->pk_package ;
                $discount->type =  'محصول محور' ;

            }
    
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
                    'discount_code' => 'required|String',  
                    
                    'date_Expire' => 'required|String', 
                    'minimum_buy' => 'required|String', 
                    'limit' => 'String', 
                    'percent_discount' => 'required|String', 
                    'maxdiscount' => 'required|String', 

                    
                 ];

    $messages = [
                'discount_code.required' => 'کد تخفیف وارد نشده است',
                'discount_code.String' => ' کد صحیح وارد نشده است',
                'discount_code.min' => 'کد تخفیف وارد شده کمتر از حد مجاز است',
                'discount_code.max' => 'کد تخفیف وارد شده بیش از حد مجاز است است',
                'discount_code.digits' => 'کد تخفیف وارد شده بیش از حد مجاز است است',

                'date_Expire.required' => 'تاریخ انقضا وارد نشده است',
                'date_Expire.String' => 'تاریخ انقضا صحیح وارد نشده است',


                'minimum_buy.required' => 'حداقل مبلغ خرید وارد نشده است',
                'minimum_buy.String' => 'حداقل مبلغ خرید  صحیح وارد نشده است',

                
                'limit.String' => 'محدودیت در تعداد استفاده  صحیح وارد نشده است',
                
                
                'percent_discount.required' => 'درصد تخفیف  وارد نشده است',
                'percent_discount.String' => 'درصد تخفیف  صحیح وارد نشده است',

                'maxdiscount.required' => 'حداکثر میزان تخفیف وارد نشده است',
                'maxdiscount.String' => 'حداکثر میزان تخفیف  صحیح وارد نشده است',




                ];

        $validator = Validator::make($request->all(),$rules,$messages);

        return $validator ;
    }
}
