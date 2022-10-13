<?php

namespace App\Repositories;

use App\Contracts\BaseInterface;
use Illuminate\Database\Eloquent\Model;

class BaseRepository implements BaseInterface{

    protected $model;

    public function __construct(Model $model)
    {
        $this->model = $model;
    }
}
