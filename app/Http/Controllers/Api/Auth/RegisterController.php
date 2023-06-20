<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class RegisterController extends Controller
{
    public function __invoke(Request $request)
    {
        $this->validate($request, [
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique(User::class),],
            'password' => ['required', 'min:8'],
            'phone_number' => ['required', 'string', 'max:255', Rule::unique(User::class),],
        ]);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'phone_number' => $request->phone_number
        ]);

        $token = $user->createToken('auth_token');

        return (new UserResource($user))->additional([
            'token' => $token->plainTextToken,
        ]);
    }
}
