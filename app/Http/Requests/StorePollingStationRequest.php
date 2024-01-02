<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePollingStationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [

            'SNO' => 'required|numeric',
            'locality' => 'required|string|unique:polling_stations,locality',
            'building_location' => 'required|string',
            'polling_area' => 'required|string',
            'total_votes' => 'required|numeric',
            'constituency_id' => 'required|exists:constituencies,id'

        ];
    }
}
