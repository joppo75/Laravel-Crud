<?php

namespace Modules\Product\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Contracts\Validation\Validator;
use Illuminate\Http\Exceptions\HttpResponseException;

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
            'name' => ['required', 'max:150'], 
            'description' => ['nullable', 'max:255'], 
            'price' => ['required', 'numeric'], 
            'status' => ['required', 'string'], 
            'stock_quantity' => ['required', 'numeric']
        ];
    }

    public function messages(): array {

        return [
            'name.required' => 'É necessário informar o nome.',
            'price.required' => 'É necessário informar o valor do produto.',
            'status.required' => 'É necessário informar o status.',
            'stock_quantity.required' => 'É necessário informar a quantidade do produto.',
        ];
    }

    protected function failedValidation(Validator $validator)
    {
        throw new HttpResponseException(response()->json([
            'success' => false,
            'message' => 'Ocorreu um erro ao validar dados.',
            'errors' => $validator->errors()
        ], 422, ['Content-Type' => 'application/json; charset=utf-8'], JSON_UNESCAPED_UNICODE));
    }
}
