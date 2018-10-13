<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Support\ProductsTrait;

class Product extends Model
{
    use ProductsTrait;

     /**
     * Table name
     *
     * @var string
     */

    protected $table = "products";

    /**
     * PrimaryKey table
     *
     * @var string
     */
    protected $primaryKey = 'product_id';

    /**
     * Field allow user change
     *
     * @var array
     */
    protected $fillable = [
        'name', 
        'description', 
        'slug', 
        'parent',
        'sku',
        'regular_price',
        'sale_price', 
        'stock', 
        'is_sale', 
        'in_stock', 
        'status',
        'use_review',
        'category_id'
    ];

    // protected $with = ['attributes'];


    
}
