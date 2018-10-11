<?php

namespace App\Foundation\Repositories\Eloquent;
use App\Foundation\Repositories\BaseRepository;

abstract class EloquentBaseRepository implements BaseRepository {

    /**
     * An instance of the Eloquent Model

     * @var \Illuminate\Database\Eloquent\Model 
     */
    protected $model;

    public function __construct($model)
    {
        $this->model = $model;
    }

    public function all()
    {
        return $this->model->all();
    }

}