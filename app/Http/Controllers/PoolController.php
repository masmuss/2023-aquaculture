<?php

namespace App\Http\Controllers;

use App\Http\Requests\Pool\StorePoolRequest;
use App\Http\Requests\Pool\UpdatePoolRequest;
use App\Http\Resources\PoolResource;
use Illuminate\Http\JsonResponse;
use App\Models\Pool;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PoolController extends Controller
{
    private Model $model;

    public function __construct(Pool $model)
    {
        $this->model = $model;
    }

    public function index(): JsonResponse
    {
        $pools = $this->model->latest()->where('user_id', Auth::id())->with('tools')->get();
        return response()->json(PoolResource::collection($pools), 200);
    }

    public function store(StorePoolRequest $request): JsonResponse
    {
        $latestPoolId = $this->model->latest()->first()->id ?? 0;
        $allPoolCounter = $this->model->count() > 0 ? $this->model->count() : 1;
        $poolId = $latestPoolId + 1 / $allPoolCounter;

        $pool = $this->model->create([
            'id' => $poolId,
            'hardware_id' => $request->hardware_id,
            'user_id' => Auth::id(),
            'name' => $request->name,
            'wide' => $request->wide,
            'long' => $request->long,
            'depth' => $request->depth,
            'noted' => $request->noted,
        ]);

        return response()->json(
            new PoolResource($pool),
            201
        );
    }

    public function show(Pool $pool): JsonResponse
    {
        if ($pool->user_id !== Auth::id()) {
            return response()->json(['message' => 'Not Found!'], 404);
        }

        return response()->json(
            new PoolResource($pool),
            200
        );
    }

    public function update(UpdatePoolRequest $request, Pool $pool): JsonResponse
    {
        if ($pool->user_id !== Auth::id()) {
            return response()->json(['message' => 'Not Found!'], 404);
        }

        $pool->update([
            'hardware_id' => $request->hardware_id,
            'name' => $request->name,
            'wide' => $request->wide,
            'long' => $request->long,
            'depth' => $request->depth,
            'noted' => $request->noted,
        ]);

        return response()->json(
            new PoolResource($pool),
            200
        );
    }

    public function destroy(Pool $pool): JsonResponse
    {
        if ($pool->user_id !== Auth::id()) {
            return response()->json(['message' => 'Not Found!'], 404);
        }

        $pool->delete();
        return response()->json(
            ['message' => 'Deleted successfully!'],
            200
        );
    }
}
