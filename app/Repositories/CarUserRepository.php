<?php

namespace App\Repositories;

use App\Contracts\CarUserInterface;
use App\Contracts\UserInterface;
use App\Models\Car;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Client\HttpClientException;

class CarUserRepository implements CarUserInterface {

    public function getCarUsers()
    {
        return Car::with('users')->get();
    }

    /**
     * Register to drive a car user, if it is allowed by the rules
     *
     * @throws HttpClientException
     */
    public function createCarUsers(array $data)
    {
        $user = User::find($data['user_id']);
        $car = Car::find($data['car_id']);
        if ($car->users()->count() || $user->cars()->count())
            throw new HttpClientException('The car is not free');

        return $car->users()->attach($user);
    }

    /**
     * Stop driving the car
     *
     * @throws HttpClientException
     */
    public function deleteCarUser(array $data)
    {
        $user = User::find($data['user_id']);
        $car = Car::find($data['car_id']);
        if (!$car->users()->count())
            throw new HttpClientException('Free' . ' - ' .$user->name . $car->brand);

        return $user->cars()->detach($car);
    }

}
