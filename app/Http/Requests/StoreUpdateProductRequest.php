<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreUpdateProductRequest extends FormRequest
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
        $id = $this->segment(2);

        return [
            'nome' => "required|min:3|max:255|unique:produtos,nome,{$id},id",
            'descricao' => 'min:3|max:1000',
            'descricao_longa' => "min:3|max:10000",
            'categoria' => 'required|min:1',
            'valor' => "required|regex:/^\d+(\.\d{1,2})?$/",
            'image' => 'required|image',
        ];
    }

    public function messages()
    {
        return [
            'nome.required' => 'Nome é obrigatório',
            'nome.min' => 'Ops! Precisa informar pelo menos 3 caracteres',
            'photo.required' => 'Ops! Precisa informar uma imagem',
        ];
    }
}
