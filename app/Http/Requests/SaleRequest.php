<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SaleRequest extends FormRequest
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
            'date_sale' => ['required'],
            'product_id' => ['required'],
            'name_client' => ['required'],
            'email_client' => ['required', 'email:rfc,dns'],
            'cpf_client' => ['required','cpf'],
            'quantity_sale' => ['required'],
            'discounts_sale' => ['required'],
            'status_sale' => ['required'],
        ];
    }

    public function messages()
    {
        return [
            'date_sale.required' => 'A data da venda é obrigatorio',
            'name_client.required' => 'O campo Nome Cliente é Obrigatorio',
            'email_client.required' => 'O campo Email é Obrigatorio',
            'email_client.email' => 'Email inserido de forma errada, por favor verificar',
            'cpf_client.required' => 'CPF obrigatorio',
            'cpf_client.cpf' => 'CPF digitado não é um CPF válido',
            'quantity_sale.required' => 'A quantidade de Unidade é obrigatorio',
            'discounts_sale.required' => 'Valor do desconto deve ser informado',
            'status_sale.required' => 'O status da Venda deve ser informado',
        ];
    }
}
