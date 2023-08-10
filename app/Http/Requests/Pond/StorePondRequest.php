<?php

namespace App\Http\Requests\Pond;

use App\Http\Requests\AuthenticatedRequest;

class StorePondRequest extends AuthenticatedRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'regency_id' => 'required|exists:regencies,id',
            'name' => 'required|string',
            'address' => 'required|string',
        ];
    }
}
