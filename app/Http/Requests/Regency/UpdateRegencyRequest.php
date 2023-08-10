<?php

namespace App\Http\Requests\Regency;

use App\Http\Requests\AuthenticatedRequest;

class UpdateRegencyRequest extends AuthenticatedRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'province_id' => 'required|exists:provinces,id',
            'name' => 'required|string|max:255',
        ];
    }
}
