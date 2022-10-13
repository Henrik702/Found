<?php

namespace App\Http\Controllers;

use App\Repositories\UserRepository;
use Illuminate\Http\Request;

class UserController extends Controller
{

    protected $repository;

    public function __construct(UserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return response()->json([
            'success' => true,
            'message' => 'get Users',
            'data' => $this->repository->getUsers(),
        ]);
    }

    public function store(Request $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Created User !!!',
            'data' => $this->repository->createUser($request->all()),
        ]);
    }

    public function destroy($id)
    {
        return response()->json([
            'success' => true,
            'message' => 'Deleted User !!!',
            'data' => $this->repository->deleteUser($id),
        ]);
    }
}
