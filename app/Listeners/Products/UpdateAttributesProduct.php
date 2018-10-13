<?php

namespace App\Listeners\Products;

use App\Events\Products\ProductUpdate;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class UpdateAttributesProduct
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
     * @param  object  $event
     * @return void
     */
    public function handle(ProductUpdate $event)
    {
        $this->updateAttribute($event);
        $this->updateSku($event);
    }

    public function updateAttribute($event)
    {
        $attributes = app('request')->input('attributes');
        $newAttribute = [];
        foreach($attributes as $attribute){
            $attribute['slug'] = str_slug($attribute['name']);
            $newAttribute[$attribute['slug']]['name'] = $attribute['name'];
            $newAttribute[$attribute['slug']]['values'][] = [
                'value' => $attribute['value'],
                'options' => $attribute['options'],
                'value_id' => $attribute['value_id']
            ];
        }

        foreach($newAttribute as $key => $attribute){
            $data = [
                'name' => $attribute['name'],
                'slug' => $key
            ];
            $atr = $event->product->attr()->updateOrCreate([ 'slug' =>$key], $data);
            foreach($attribute['values'] as $value){
                $atr->values()->updateOrCreate(['value_id' => $value['value_id']],$value);
            }
        }
    }

    public function updateSku($event)
    {
        $skus = app('request')->input('skus');

        $event->product->skus()->createMany($skus);

    }
}
