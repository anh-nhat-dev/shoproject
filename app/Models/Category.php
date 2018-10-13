<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    /**
     * Table name
     *
     * @var string
     */

    protected $table = "categories";

    /**
     * PrimaryKey table
     *
     * @var string
     */
    protected $primaryKey = 'category_id';

    /**
     * Field allow user change
     *
     * @var array
     */
    protected $fillable = [
        'name', 'description', 'slug', 'parent'
    ];
    /**
     * Undocumented variable
     *
     * @var array
     */


    public function childrend()
    {
        return $this->hasMany(static::class,'parent', 'category_id');
    }
}
