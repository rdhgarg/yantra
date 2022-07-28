<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Validator;
use View;
use DB;
use App\Category;

class AppServiceProvider extends ServiceProvider
{


    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
        config()->set('jwt.ttl', 60*60*7);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */

    public  function UpdateExcahngeRates(){
        //$currency=session()->get('currency');
        if(!isset($currency)) $currency=session()->put('currency','INR');
        //  $currency=session()->get('currency');
        //  $req_url = "https://prime.exchangerate-api.com/v5/3091a1c09c3188662c5b18fd/latest/INR";
        //  $response_json = file_get_contents($req_url);
        //  $response = json_decode($response_json);
        //  if('success' === $response->result) {
        //     return $response->conversion_rates->$currency;
        //  }
     }


    public function boot()
    {
        Schema::defaultStringLength(191);
		//Add this custom validation rule.
		Validator::extend('alpha_spaces', function ($attribute, $value) {
    	// This will only accept alpha and spaces.
	    // If you want to accept hyphens use: /^[\pL\s-]+$/u.
		return preg_match('/^[\pL\s]+$/u', $value);
        });
         View::share('category',Category::where(['parent_id'=>0])->cursor());
         $currency=session()->get('currency');
         if(!isset($currency)) session()->put('rates',$this->UpdateExcahngeRates());
    }


}
