<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pool\{StorePoolRequest, UpdatePoolRequest};
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
        $user = Auth::user();
        if ($user->is_admin) {
            $pools = $this->model->latest()->get();
            return response()->json(PoolResource::collection($pools), 200);
        }

        $pools = $this->model->latest()->where('user_id', Auth::id())->get();
        return response()->json(PoolResource::collection($pools), 200);
    }

    public function store(StorePoolRequest $request): JsonResponse
    {
        $latestPoolId = $this->model->count() > 0 ? $this->model->orderBy('id', 'desc')->first()->id : 0;
        $poolId = $latestPoolId + 1;

        $pool = $this->model->create([
            'id' => $poolId,
            'hardware_id' => $request->hardware_id,
            'pond_id' => $request->pond_id,
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
        $user = Auth::user();

        if ($user->is_admin) {
            $data = $this->model->where('id', $pool->id)->with('samplings', 'monitorings')->first();
            return response()->json(
                new PoolResource($data),
                200
            );
        }

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
        $pool->update([
            'hardware_id' => $request->hardware_id,
            'pond_id' => $request->pond_id,
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
        $pool->delete();
        return response()->json(
            ['message' => 'Deleted successfully!'],
            200
        );
    }
}
