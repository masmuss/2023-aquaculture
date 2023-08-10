<?php

namespace App\Http\Requests\Pool;

use App\Http\Requests\AuthenticatedRequest;

class UpdatePoolRequest extends AuthenticatedRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'hardware_id' => 'required|string',
            'pond_id' => 'required|string',
            'name' => 'required|string',
            'wide' => 'required|numeric',
            'long' => 'required|numeric',
            'depth' => 'required|numeric',
            'noted' => 'nullable|string|max:255',
        ];
    }
}
