<?php

namespace Tests\Feature;

use App\Models\Car;
use App\Models\User;
use Tests\TestCase;

class CarUserTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->get('/');

        $response->assertStatus(200);
    }


    public function test_create_car_user()
    {
        $car = Car::first();
        $user = User::first();

        $response = $this->post('/api/list/car-user/', [
            'car_id' => $car->id,
            'user_id' => $user->id,
        ]);
        $response->assertStatus(200);

        /**
         * There will be an error when requesting again.
         */
//        $response = $this->post('/api/list/car-user/', [
//            'car_id' => $car->id,
//            'user_id' => $user->id,
//        ]);
//        $response->assertStatus('The car is not free !!!');
    }

    public function test_delete_car_user()
    {
        $car = Car::first();
        $user = User::first();

        $response = $this->delete('/api/list/car-user/1', [
            'car_id' => $car->id,
            'user_id' => $user->id,
        ]);
        $response->assertStatus(200);


    }


}
