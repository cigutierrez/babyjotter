<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rules\RequiredIf;

class FeedingRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        // Because I am doing our checking everywhere else, it's okay to set this to true. We always want the user to be able to submit a feeding.
        // There is still a possibility someone can forge an entry if they did a custom POST request to the /babies/id/feedings/create but that's 
        // a lot of work.
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
            'breast' => 'required_if:type,==,breast',
            'length' => [],
            'amount' => 'required_if:type,==,formula',
            'measurement' => 'required_if:type,==,formula'
        ];
    }
}
