<?php

namespace App\Foundation\Repositories;

interface BaseRepository {


    /**
     * Get All Model
     *
     * @return \Illuminate\Database\Eloquent\Collection
     */

    public function all();


}