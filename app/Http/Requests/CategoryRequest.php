<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CategoryRequest extends FormRequest
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
        // C'est préparé pour gérer la validation de la modification. Dans ce cas on sait qu’il faut arranger un peu la règle d’unicité.
        $id = $this->category ? ',' . $this->category->id : '';
        return $rules = [
            'name' => 'required|string|max:255|unique:categories,name' . $id,
        ];
    }
}
