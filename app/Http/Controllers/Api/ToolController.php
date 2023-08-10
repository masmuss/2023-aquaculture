<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Tool\{StoreToolRequest, UpdateToolRequest};
use App\Http\Resources\ToolResource;
use App\Models\Tool;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;

class ToolController extends Controller
{
    private Model $model;

    public function __construct(Tool $model)
    {
        $this->model = $model;
    }

    public function index(): JsonResponse
    {
        $tools = $this->model->latest()->get();
        return response()->json(ToolResource::collection($tools), 200);
    }

    public function store(StoreToolRequest $request)
    {
        $tool = $this->model->create([
            'hardware_id' => $request->hardware_id,
            'pool_id' => $request->pool_id,
            'time' => $request->time,
            'temperature' => $request->temperature,
            'ph' => $request->ph,
            'salinity' => $request->salinity,
            'do' => $request->do,
        ]);

        return response()->json(
            new ToolResource($tool),
            201
        );
    }

    public function show(Tool $tool): JsonResponse
    {
        if ($tool->user_id !== Auth::id()) {
            return response()->json(['message' => 'Not Found!'], 404);
        }

        return response()->json(
            new ToolResource($tool),
            200
        );
    }

    public function update(UpdateToolRequest $request, Tool $tool): JsonResponse
    {
        if ($tool->user_id !== Auth::id()) {
            return response()->json(['message' => 'Not Found!'], 404);
        }

        $tool->update([
            'hardware_id' => $request->hardware_id,
            'pool_id' => $request->pool_id,
            'time' => $request->time,
            'temperature' => $request->temperature,
            'ph' => $request->ph,
            'salinity' => $request->salinity,
            'do' => $request->do,
        ]);

        return response()->json(
            new ToolResource($tool),
            200
        );
    }

    public function destroy(Tool $tool): JsonResponse
    {
        if ($tool->user_id !== Auth::id()) {
            return response()->json(['message' => 'Not Found!'], 404);
        }

        $tool->delete();
        return response()->json(null, 204);
    }
}
