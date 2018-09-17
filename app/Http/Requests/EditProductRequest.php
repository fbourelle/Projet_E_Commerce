<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditProductRequest extends FormRequest
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
              'designation' => 'required|min:3',
              'description' => 'required|min:3',
              'weight' => 'required|min:0',
              'price' => 'required|min:0',
              'material' => 'required|min:3',
              'reduction' => 'max:100'
      ];
    }
}
