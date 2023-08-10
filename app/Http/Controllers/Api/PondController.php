<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Pond\{StorePondRequest, UpdatePondRequest};
use App\Models\Pond;
use Illuminate\Http\JsonResponse;
use App\Http\Resources\PondResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class PondController extends Controller
{
    private Model $model;

    public function __construct(Pond $model)
    {
        $this->model = $model;
    }

    public function index(): JsonResponse
    {
        $user = Auth::user();

        if ($user->is_admin) {
            $ponds = $this->model->latest()->with('pools', 'user')->get();
            return response()->json(PondResource::collection($ponds), 200);
        }

        $ponds = $this->model->latest()->where('user_id', $user->id)->with('pools')->get();
        return response()->json(PondResource::collection($ponds), 200);
    }

    public function store(StorePondRequest $request): JsonResponse
    {
        $pond = $this->model->create([
            'user_id' => Auth::id(),
            'regency_id' => $request->regency_id,
            'name' => $request->name,
            'address' => $request->address,
        ]);

        return response()->json(
            new PondResource($pond),
            201
        );
    }

    public function show(Pond $pond): JsonResponse
    {
        $user = Auth::user();
        if ($user->is_admin) {
            return response()->json(
                new PondResource($pond),
                200
            );
        }

        if ($pond->user_id !== Auth::id()) {
            return response()->json(['message' => 'Not Found!'], 404);
        }

        return response()->json(
            new PondResource($pond),
            200
        );
    }

    public function update(UpdatePondRequest $request, Pond $pond): JsonResponse
    {
        if ($pond->user_id !== Auth::id()) {
            return response()->json(['message' => 'Not Found!'], 404);
        }

        $pond->update([
            'hardware_id' => $request->hardware_id,
            'regency_id' => $request->regency_id,
            'name' => $request->name,
            'address' => $request->address,
        ]);

        return response()->json(
            new PondResource($pond),
            200
        );
    }

    public function destroy(Pond $pond): JsonResponse
    {
        if ($pond->user_id !== Auth::id()) {
            return response()->json(['message' => 'Not Found!'], 404);
        }

        $pond->delete();
        return response()->json(
            ['message' => 'Deleted successfully!'],
            200
        );
    }
}
