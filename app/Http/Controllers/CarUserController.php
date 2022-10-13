<?php

namespace App\Http\Controllers;

use App\Http\Requests\CarUser\CreateCarUserRequest;
use App\Http\Requests\CarUser\DeleteCarUserRequest;
use App\Repositories\CarUserRepository;

class CarUserController extends Controller
{
    protected $repository;

    public function __construct(CarUserRepository $repository)
    {
        $this->repository = $repository;
    }

    public function index()
    {
        return response()->json([
            'success' => true,
            'message' => 'get car-users',
            'data' => $this->repository->getCarUsers(),
        ]);
    }

    public function store(CreateCarUserRequest $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Created has ben successfully, Car-User',
            'data' => $this->repository->createCarUsers($request->all()),
        ]);
    }

    public function destroy(DeleteCarUserRequest $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Deleted has ben successfully, Car-User',
            'data' => $this->repository->deleteCarUser($request->all()),
        ]);
    }
}
