<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ForgotOtp extends Model
{
    /**
     * The attributes that are mass assignable.
     *	
     * @var array
     */
	 protected $table = 'forgot_otp';
    protected $fillable = [
        'mobile', 'otp'
    ];
}
