<?php

namespace App\Http\Requests\Province;

use App\Http\Requests\AuthenticatedRequest;
use Illuminate\Support\Facades\Auth;

class StoreProvinceRequest extends AuthenticatedRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'id' => 'required|integer|unique:provinces,id',
            'name' => 'required|string|unique:provinces,name'
        ];
    }
}
