<?php

namespace App\Repositories;

use App\Contracts\CarInterface;
use App\Models\Car;
use Illuminate\Database\Eloquent\Model;

class CarRepository extends BaseRepository implements CarInterface{

    protected $model;

    public function __construct(Car $model)
    {
        $this->model = $model;
    }

    public function getCars()
    {
        return Car::get();
    }

    public function createCar(array $data)
    {
        return Car::create($data);
    }

    public function deleteCar(int $id)
    {
        return Car::find($id)->delete();
    }
}
