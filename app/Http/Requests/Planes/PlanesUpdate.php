<?php

namespace App\Http\Requests\Planes;

use Illuminate\Foundation\Http\FormRequest;

class PlanesUpdate extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'choferes_id' => 'required|exists:choferes,id',
            'moviles_id' => 'required|exists:moviles,id',
            'planes_id' => 'required|exists:planes,id',
            'viaje' => 'required|lte:2|gte:1'
        ];
    }
}
