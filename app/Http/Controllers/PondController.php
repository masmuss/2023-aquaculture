<?php

namespace App\Http\Controllers;

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
        $ponds = $this->model->latest()->where('user_id', Auth::id())->get();
        return response()->json(PondResource::collection($ponds), 200);
    }

    public function store(StorePondRequest $request): JsonResponse
    {
        $pond = $this->model->create([
            'hardware_id' => $request->hardware_id,
            'user_id' => Auth::id(),
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
        return response()->json(['message' => 'Deleted!']);
    }
}
