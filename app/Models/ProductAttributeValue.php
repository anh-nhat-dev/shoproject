<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttributeValue extends Model
{
      /**
     * Table name
     *
     * @var string
     */

    protected $table = "product_attribute_values";

    /**
     * PrimaryKey table
     *
     * @var string
     */
    protected $primaryKey = 'value_id';

    /**
     * Field allow user change
     *
     * @var array
     */
    protected $fillable = [
        'value',
        'options'
    ];

    protected $appends = ['name'];

    public function getNameAttribute()
    {
       $name = $this->attr->name;
       return $name;
    }

    public function attr()
    {
        return $this->belongsTo(\App\Models\ProductAttribute::class, 'attribute_id');
    }
}
