<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
	 protected $table = 'category';
    protected $fillable = ['title'];

	public function parent_detail()
    {
       return $this->hasOne('App\Category', 'id', 'parent_id');
    }


    public function child_detail()
    {
       return $this->hasMany('App\Category','parent_id','id');
    }

    public function child_products()
    {
        return $this->hasMany('App\Product', 'category_id', 'id');        
    }



}
