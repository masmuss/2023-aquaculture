<?php

namespace App\Http\Requests\Hardware;

use App\Http\Requests\AuthenticatedRequest;

class UpdateHardwareRequest extends AuthenticatedRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'string|nullable|exists:users,id',
            'name' => 'required|string',
        ];
    }
}
