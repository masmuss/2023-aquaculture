<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Regency\StoreRegencyRequest;
use App\Http\Requests\Regency\UpdateRegencyRequest;
use App\Models\Regency;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

class RegencyController extends Controller
{
    private Model $model;
    public function __construct(Regency $regency)
    {
        $this->model = $regency;
    }

    public function index(): JsonResponse
    {
        $regencies = $this->model->all();
        return response()->json($regencies, 200);
    }

    public function store(StoreRegencyRequest $request): JsonResponse
    {
        $regency_id = $this->model->latest('id')->first()->id + 1;
        $regency = $this->model->create([
            'id' => $regency_id,
            'province_id' => $request->province_id,
            'name' => $request->name
        ]);

        return response()->json($regency, 201);
    }

    public function show(Regency $regency): JsonResponse
    {
        $data = $regency->with('province')->first();
        return response()->json($data, 200);
    }

    public function update(UpdateRegencyRequest $request, Regency $regency): JsonResponse
    {
        $regency->update($request->validated());
        return response()->json($regency, 200);
    }

    public function destroy(Regency $regency): JsonResponse
    {
        $regency->delete();
        return response()->json(['message' => 'Deleted successfully!'], 200);
    }
}
