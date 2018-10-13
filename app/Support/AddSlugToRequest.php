<?php
namespace App\Support;

trait AddSlugToRequest {

    /**
     * Add Slug to request
     *
     * @return void
     */
    protected function prepareForValidation()
    {
        $this->merge(['slug'=> str_slug($this->name)]);
    }
}