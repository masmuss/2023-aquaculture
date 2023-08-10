<?php

namespace App\Http\Requests\Record;

use App\Http\Requests\AuthenticatedRequest;

class StoreRecordRequest extends AuthenticatedRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array|string>
     */
    public function rules(): array
    {
        return [
            'hardware_id' => 'required|string|exists:hardwares,id',
            'pool_id' => 'required|integer|exists:pools,id',
            'time' => 'required|string',
            'temperature' => 'required|numeric',
            'ph' => 'required|numeric',
            'salinity' => 'required|numeric',
            'do' => 'required|numeric',
        ];
    }
}
