<?php

namespace App\Support;

trait ProductsTrait
{
    /**
     * Change is_sale enum
     *
     * @return void
     */
    public function setIsSaleAttribute()
    {
        $this->attributes['is_sale'] = app('request')->input('is_sale') == 'on' ? 'true' : 'false';
    }


    public function category()
    {
        return $this->hasOne(\App\Models\Category::class, 'category_id','category_id');
    }

    public function attr()
    {
        return $this->hasMany(\App\Models\ProductAttribute::class, 'product_id');
    }

    public function values()
    {
        $attrs = $this->attr;

        $values = collect();

        $attrs->each(function($att, $i) use ($values){
            $att->values->each(function($value,$j) use ($values){
                $values->push($value);
            });
        });

        return $values;
    }

    public function skus()
    {
        return $this->hasMany(\App\Models\Sku::class, 'product_id');
    }
    
}