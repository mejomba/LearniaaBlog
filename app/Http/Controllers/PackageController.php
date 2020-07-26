<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PackageController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function pay($slug)
    {  

        if(Auth::check())
        {
            $user =  Auth::user() ;
            $package = Package::where('pk_package', $slug)->first();
            $profile = Profile::where('pk_users',$user->pk_users)->first();
            $wallet = $profile->wallet ; 
            $val_package = (int) $package->price ;
            $val_wallet =  (int)$wallet  ;
    
            if($val_wallet >= $val_package)
            {
               $new_wallet = $val_wallet - $val_package ;
               $id = $profile->pk_profiles ;
               $p = Profile::find($id);
               $p->wallet = $new_wallet ;
               $p->save();
    
    
               $transaction = new Transaction();
               $transaction->pk_users =  $user->pk_users ;
               $transaction->price = $package->price;
               $transaction->type = 'خرید دوره آموزشی';
               $transaction->digital_receipt =  rand(0,1000000000) ;
               $transaction->pk_package =  $slug ;
               $transaction->status = "عملیات موفق";
                // process extras --> save all option to array And save to $new_instance
               $data_extras = array();
               $data_extras["problem"] = 'عملیات موفق';
               $data_extras["type"] = 'خرید ازموجودی کیف پول';
              
               $transaction->extras =  json_encode($data_extras,false) ; 
    
               $transaction->save();
    
               return redirect()->back()->with('success','خرید انجام شد . می توانید دوره آموزشی را مشاهده نمایید');    
             }
             else
             {
                $package = Package::where('pk_package', $slug)->first();

                return redirect()->route('transaction.store',
                ['price' => $package->price , 'type' => 'خرید دوره آموزشی' , 'slug' => $slug ]);
             }

        }
        else
        {
            $package = Package::where('pk_package', $slug)->first();

            return redirect()->route('transaction.store',
            ['price' => $package->price , 'type' => 'خرید دوره آموزشی' , 'slug' => $slug ]);
        }
    }





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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
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
