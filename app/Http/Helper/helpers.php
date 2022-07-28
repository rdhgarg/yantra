<?php

use App\Product;
use App\Category;
use App\TempAddress;



function getproductlist(){
    return Product::pluck('product_name')->toArray();
}



function getcategorylist(){
    return Category::pluck('title')->toArray();
}


function getTempPincode()
{
    $ip = \Request::ip();

    $pincode = TempAddress::where(function($query) use($ip){
            if(!Auth()->guard('web')->user())
            {
                $query->where('ip',$ip);
            }
            else
            {
                $query->where('user_id',Auth()->guard('web')->user()->id);
            }
    })->latest()->first();

    if($pincode)
    {
        return $pincode;
    }
    else
    {
        return $pincode=null;
    }


}

