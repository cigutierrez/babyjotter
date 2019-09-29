<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class MedicationRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'type' => 'required',
            'name' => 'required',
            // how_often is optional because not all medications have this.
            'how_often' =>  [],
            // times_per_day is optional because not all medications specify this.
            'times_per_day' => [],
            'amount' => 'required_if:type,==,liquid',
            'measurement' => 'required_if:type,==,liquid',
            'notes' => []
        ];
    }
}
