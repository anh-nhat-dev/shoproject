<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ProductAttribute extends Model
{
      /**
     * Table name
     *
     * @var string
     */

    protected $table = "product_attributes";

    /**
     * PrimaryKey table
     *
     * @var string
     */
    protected $primaryKey = 'attribute_id';

    /**
     * Field allow user change
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'slug'
    ];

    // protected $with = ['values'];

    public function values()
    {
        return $this->hasMany(\App\Models\ProductAttributeValue::class, 'attribute_id');
    }
}
