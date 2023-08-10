<?php

namespace App\Http\Requests\Hardware;

use App\Http\Requests\AuthenticatedRequest;
use Illuminate\Foundation\Http\FormRequest;

class StoreHardwareRequest extends AuthenticatedRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'user_id' => 'uuid|exists:users,id',
            'name' => 'required|string|max:255',
        ];
    }
}
