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

    /**
     * @OA\Get(
     * path="/api/list/cars",
     * operationId="getCars",
     * tags={"Cars"},
     * summary="Get All Cars",
     *      @OA\Response(
     *          response=201,
     *          description="get Cars",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="get Users",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(response=404, description="Resource Not Found"),
     * )
     */
    public function index()
    {
        return response()->json([
            'success' => true,
            'message' => 'get Cars',
            'data' => $this->repository->getCars(),
        ]);
    }

    /**
     * @OA\Post(
     * path="/api/list/cars",
     * operationId="createCar",
     * tags={"Cars"},
     * summary="Car Register",
     * description="Car Register here",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *               required={"brand"},
     *               @OA\Property(property="brand", type="text"),
     *            ),
     *        ),
     *    ),
     *      @OA\Response(
     *          response=201,
     *          description="Register Successfully",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="Register Successfully",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=422,
     *          description="Unprocessable Entity",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=404, description="Resource Not Found"),
     * )
     */
    public function store(Request $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Register Successfully',
            'data' => $this->repository->createCar($request->all()),
        ]);
    }

    /**
     * @OA\Delete(
     * path="/api/list/cars/{id}",
     * operationId="deleteCar",
     * tags={"Cars"},
     * summary="delete car",
     * description="Car delete here",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *               required={"id"},
     *               @OA\Property(property="id", type="integer")
     *            ),
     *        ),
     *    ),
     *      @OA\Response(
     *          response=201,
     *          description="Deleted Successfully !!!",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="Deleted Successfully !!!",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=422,
     *          description="Unprocessable Entity",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(response=400, description="Bad request"),
     *      @OA\Response(response=404, description="Resource Not Found"),
     * )
     */
    public function destroy($id)
    {
        return response()->json([
            'success' => true,
            'message' => 'Deleted Successfully !!!',
            'data' => $this->repository->deleteCar($id),
        ]);
    }
}
