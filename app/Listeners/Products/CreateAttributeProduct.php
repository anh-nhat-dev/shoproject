<?php

namespace App\Listeners\Products;

use App\Events\Products\ProductCreate;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Request;

class CreateAttributeProduct
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  ProductCreate  $event
     * @return void
     */
    public function handle(ProductCreate $event)
    {
        $attributes = app('request')->input('attributes');
        $newAttribute = [];
        foreach($attributes as $attribute){
            $attribute['slug'] = str_slug($attribute['name']);
            $newAttribute[$attribute['slug']]['name'] = $attribute['name'];
            $newAttribute[$attribute['slug']]['values'][] = [
                'value' => $attribute['value'],
                'options' => $attribute['options']
            ];
        }

        foreach($newAttribute as $key => $attribute){
            $data = [
                'name' => $attribute['name'],
                'slug' => $key
            ];
            $atr = $event->product->attr()->create($data);
            $atr->values()->createMany($attribute['values']);
        }
    }
}
