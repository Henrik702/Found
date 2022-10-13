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

    /**
     * @OA\Get(
     * path="/api/list/car-user",
     * operationId="getCarUsers",
     * tags={"Car-user"},
     * summary="Get All Users",
     *      @OA\Response(
     *          response=201,
     *          description="get car-users",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="get car-users",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(response=404, description="Resource Not Found"),
     * )
     */
    public function index()
    {
        return response()->json([
            'success' => true,
            'message' => 'get car-users',
            'data' => $this->repository->getCarUsers(),
        ]);
    }
    /**
     * @OA\Post(
     * path="/api/list/car-user",
     * operationId="createCarUsers",
     * tags={"Car-user"},
     * summary="Car-User Register",
     * description="Car-User Register here",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *               required={"user_id","car_id"},
     *               @OA\Property(property="user_id", type="integer"),
     *               @OA\Property(property="car_id", type="integer")
     *            ),
     *        ),
     *    ),
     *      @OA\Response(
     *          response=201,
     *          description="Created has ben successfully, Car-User",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="Created has ben successfully, Car-User",
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
    public function store(CreateCarUserRequest $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Created has ben successfully, Car-User',
            'data' => $this->repository->createCarUsers($request->all()),
        ]);
    }
    /**
     * @OA\Delete(
     * path="/api/list/car-user",
     * operationId="deleteCarUser",
     * tags={"Car-user"},
     * summary="delete Car-User",
     * description="Car-User delete here",
     *     @OA\RequestBody(
     *         @OA\JsonContent(),
     *         @OA\MediaType(
     *            mediaType="multipart/form-data",
     *            @OA\Schema(
     *               type="object",
     *               required={"user_id","car_id"},
     *               @OA\Property(property="user_id", type="integer"),
     *               @OA\Property(property="car_id", type="integer")
     *            ),
     *        ),
     *    ),
     *      @OA\Response(
     *          response=201,
     *          description="Deleted has ben successfully, Car-User",
     *          @OA\JsonContent()
     *       ),
     *      @OA\Response(
     *          response=200,
     *          description="Deleted has ben successfully, Car-User",
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
    public function destroy(DeleteCarUserRequest $request)
    {
        return response()->json([
            'success' => true,
            'message' => 'Deleted has ben successfully, Car-User',
            'data' => $this->repository->deleteCarUser($request->all()),
        ]);
    }
}
