<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Province\StoreProvinceRequest;
use App\Http\Requests\Province\UpdateProvinceRequest;
use App\Models\Province;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

class ProvinceController extends Controller
{
    private Model $model;

    public function __construct(Province $model)
    {
        $this->model = $model;
    }

    public function index(): JsonResponse
    {
        $provinces = $this->model->all();
        return response()->json($provinces, 200);
    }

    public function show(Province $province): JsonResponse
    {
        $data = $province->with('regencies')->first();

        return response()->json($data, 200);
    }

    public function store(StoreProvinceRequest $request): JsonResponse
    {
        $province = $this->model->create($request->validated());
        return response()->json($province, 201);
    }

    public function update(UpdateProvinceRequest $request, Province $province): JsonResponse
    {
        $province->update($request->validated());
        return response()->json($province, 200);
    }

    public function destroy(Province $province): JsonResponse
    {
        $province->delete();
        return response()->json(['message' => 'Deleted successfully!'], 200);
    }
}
