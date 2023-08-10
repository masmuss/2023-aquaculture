<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Record\{StoreRecordRequest, UpdateRecordRequest};
use App\Http\Resources\RecordResource;
use App\Models\Monitoring;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class MonitoringController extends Controller
{
    private Model $model;

    public function __construct(Monitoring $model)
    {
        $this->model = $model;
    }

    public function index(): JsonResponse
    {
        $monitorings = $this->model->latest()->get();
        return response()->json(RecordResource::collection($monitorings), 200);
    }

    public function store(StoreRecordRequest $request)
    {
        $monitoring = $this->model->create([
            'hardware_id' => $request->hardware_id,
            'pool_id' => $request->pool_id,
            'time' => $request->time,
            'temperature' => $request->temperature,
            'ph' => $request->ph,
            'salinity' => $request->salinity,
            'do' => $request->do,
        ]);

        return response()->json(
            new RecordResource($monitoring),
            201
        );
    }

    public function show(Monitoring $monitoring): JsonResponse
    {
        return response()->json(
            new RecordResource($monitoring),
            200
        );
    }

    public function update(UpdateRecordRequest $request, Monitoring $monitoring): JsonResponse
    {
        $monitoring->update([
            'hardware_id' => $request->hardware_id,
            'pool_id' => $request->pool_id,
            'time' => $request->time,
            'temperature' => $request->temperature,
            'ph' => $request->ph,
            'salinity' => $request->salinity,
            'do' => $request->do,
        ]);

        return response()->json(
            new RecordResource($monitoring),
            200
        );
    }

    public function destroy(Monitoring $monitoring): JsonResponse
    {
        $monitoring->delete();
        return response()->json(
            ['message' => 'Deleted!'],
            204
        );
    }
}
