<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use App\Http\Resources\UserResource;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\JsonResponse;

class UserController extends Controller
{
    private Model $model;

    public function __construct(User $model)
    {
        $this->model = $model;
    }

    public function index(): JsonResponse
    {
        if (!Auth::user()->is_admin) {
            return response()->json(['message' => 'Unauthorized'], 401);
        }

        $users = $this->model->latest()->get();
        return response()->json(UserResource::collection($users), 200);
    }
}
