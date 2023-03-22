<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Model;

class CategoryProduct extends Model
{
    public $timestamps = false;
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['product_id','category_id','sub_category_id'];

    /**
     * The attributes that aren't mass assignable.
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * fields will be Carbon-ized
     * @var array
     */
    protected $dates = [];

    /**
     * The attributes that should be cast to native types.
     * @var array
     */
    protected $casts = [
        'product_id' => 'int',
        'category_id' => 'int',
        'sub_category_id' => 'int',
    ];
}
