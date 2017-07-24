<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreMember extends FormRequest
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
            // 'photo' => 'mimes:jpeg,jpg,png,gif|max:10240',
            'name' => 'required|regex:/(^[A-Za-z ]+$)+/|min:1|max:100|not_in:undefined',
            'address' => 'required|min:1|max:300|not_in:undefined',
            'age' => 'required|numeric|min:1|max:99|digits_between:1,2'
        ];
    }
}
