<?php

namespace App\Http\Requests\Api\V1\Task;

use Illuminate\Contracts\Validation\Validator;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Exceptions\HttpResponseException;

class StoreRequest extends FormRequest
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
            'name' => 'required',
            'address' => 'required',
            'date_type' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
            'budget' => 'required',
            'description' => 'required',
            'category_id' => 'required|numeric',
            'phone_number' => 'required|int|min:9'
        ];
    }
}
