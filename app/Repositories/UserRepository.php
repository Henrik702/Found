<?php

namespace App\Repositories;

use App\Contracts\UserInterface;
use App\Models\User;
use Illuminate\Database\Eloquent\Model;

class UserRepository extends BaseRepository implements UserInterface {

    protected $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function getUsers()
    {
        return User::get();
    }

    public function createUser(array $data)
    {
        return User::create($data);
    }

    public function deleteUser(int $id)
    {
        return User::find($id)->delete();
    }
}
