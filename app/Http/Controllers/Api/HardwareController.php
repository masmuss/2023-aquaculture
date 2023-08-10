<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Hardware\StoreHardwareRequest;
use App\Http\Requests\Hardware\UpdateHardwareRequest;
use App\Models\Hardware;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

class HardwareController extends Controller
{
    private Model $model;

    public function __construct(Hardware $model)
    {
        $this->model = $model;
    }

    public function index(): JsonResponse
    {
        $hardware = $this->model->all();
        return response()->json($hardware, 200);
    }

    public function store(StoreHardwareRequest $request): JsonResponse
    {
        $hardware = $this->model->create($request->validated());
        return response()->json($hardware, 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Hardware $hardware): JsonResponse
    {
        $data = $this->model->with(['pools', 'user'])->find($hardware->id);
        return response()->json($data, 200);
    }

    public function update(UpdateHardwareRequest $request, Hardware $hardware): JsonResponse
    {
        $hardware->update($request->validated());
        return response()->json($hardware, 200);
    }

    public function destroy(Hardware $hardware)
    {
        $hardware->delete();
        return response()->json(['message' => 'Deleted successfully!'], 200);
    }
}
