<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ProductRequest extends FormRequest
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
            'product_name' => [
                'required',
                'string',
                'max:255',
                Rule::unique('products')->ignore($this->product),
            ],
            
            'product_description' => [
                'nullable',
                'string',
            ],
            
            'product_price' => [
                'required',
                'regex:/^\d{1,8}(\.\d{1,2})?$/',
                'min:0',
            ],
            
            'product_stock' => [
                'required',
                'integer',
                'min:0',
            ],

            'product_status' => [
                'required',
                'boolean',
            ],
        ];
    }

    /**
     * Get custom messages for validator errors.
     *
     * @return array
     */
    public function messages()
    {
        return [
            'product_name.unique' => 'Ya existe un producto con este nombre.',
            'product_price.regex' => 'El formato del precio no es válido. Use solo números y hasta dos decimales.',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array
     */
    public function attributes()
    {
        return [
            'product_name' => 'nombre del producto',
            'product_description' => 'descripción del producto',
            'product_price' => 'precio del producto',
            'product_stock' => 'stock del producto',
            'product_status' => 'estado del producto',
        ];
    }
}
