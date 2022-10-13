<?php

namespace App\Http\Controllers;

use App\Repositories\CarRepository;
use Illuminate\Http\Request;

class CarController extends Controller
{
    protected $repository;

    public function __construct(CarRepository $repository)
    {
        $this->repository = $repository;
    }
    public function index()
    {
        return response()->json([
            'success' => true,
            'message' => 'get Cars',
            'data' => $this->repository->getCars(),
        ]);
    }

    public function store(Request $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Created Car !!!',
            'data' => $this->repository->createCar($request->all()),
        ]);
    }

    public function destroy($id)
    {
        return response()->json([
            'success' => true,
            'message' => 'Deleted Car !!!',
            'data' => $this->repository->deleteCar($id),
        ]);
    }
}
