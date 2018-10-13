<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Sku extends Model
{
  /**
     * Table name
     *
     * @var string
     */

    protected $table = "skus";

    /**
     * PrimaryKey table
     *
     * @var string
     */
    protected $primaryKey = 'sku_id';

    /**
     * Field allow user change
     *
     * @var array
     */
    protected $fillable = [
        'price',
        'stock'
    ];

    // protected $with = ['values'];

    
}
