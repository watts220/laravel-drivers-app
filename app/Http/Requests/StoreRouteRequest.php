<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreRouteRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'origin' => ['required', 'string', 'max:255'],
            'destination' => ['required', 'string', 'max:255'],
            'cost' => ['required', 'numeric', 'min:0'],
            'date' => ['required', 'date'],
            'driver_id' => ['required', 'exists:drivers,id'],
        ];
    }
}
