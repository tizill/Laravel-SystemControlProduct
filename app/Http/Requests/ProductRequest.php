<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name_product' => ['required'],
            'description_product' => ['required'],
            'price_product' => ['required'],
            'image_product' => ['required', 'image', 'max:2048', 'mimes:jpeg,png,gif'],
        ];
    }

    public function messages()
    {
        return [
            'name_product.required' => 'Nome do Produto Obrigatorio',
            'description_product.required' => 'Descrição do Produto Obrigatorio',
            'price.required_product' => 'Preço do Produto Obrigatorio',
            'image_product.required' => 'Imagem do produto obrigatoria',
            'image_product.max' => 'Tamanho maximo da imagem de 2 MB',
            'image_product.image' => 'Imagem do produto tem que ser uma imagem',
            'image_product.mimes' => 'Imagem do produto tem tem que ser no formato jpeg,png ou gif',
        ];
    }
}
