<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Record\{StoreRecordRequest, UpdateRecordRequest};
use App\Http\Resources\RecordResource;
use App\Models\Sampling;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class SamplingController extends Controller
{
    private Model $model;

    public function __construct(Sampling $model)
    {
        $this->model = $model;
    }

    public function index(): JsonResponse
    {
        $samplings = $this->model->with('hardware')->latest()->get();
        return response()->json(RecordResource::collection($samplings), 200);
    }

    public function store(StoreRecordRequest $request)
    {
        $sampling = $this->model->create([
            'hardware_id' => $request->hardware_id,
            'pool_id' => $request->pool_id,
            'time' => $request->time,
            'temperature' => $request->temperature,
            'ph' => $request->ph,
            'salinity' => $request->salinity,
            'do' => $request->do,
        ]);

        return response()->json(
            new RecordResource($sampling),
            201
        );
    }

    public function show(Sampling $sampling): JsonResponse
    {
        return response()->json(
            new RecordResource($sampling),
            200
        );
    }

    public function update(UpdateRecordRequest $request, Sampling $sampling): JsonResponse
    {
        $sampling->update([
            'hardware_id' => $request->hardware_id,
            'pool_id' => $request->pool_id,
            'time' => $request->time,
            'temperature' => $request->temperature,
            'ph' => $request->ph,
            'salinity' => $request->salinity,
            'do' => $request->do,
        ]);

        return response()->json(
            new RecordResource($sampling),
            200
        );
    }

    public function destroy(Sampling $sampling): JsonResponse
    {
        $sampling->delete();
        return response()->json(
            ['message' => 'Deleted successfully!',],
            204
        );
    }
}
