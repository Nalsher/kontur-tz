<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactFormRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
    
    public function rules(): array {
        return [
            "name" => "required|string",
            "email" => "required|email:rfc,dns",
            "phone" => "required|string|regex:/^\+7 \d{3} \d{3} \d{2} \d{2}$/i"
        ];
    }
      
    public function messages(): array {
        return [
            "name.required" => "Обязательно указать имя",
            "email.email" => "Неверный формат почты",
            "email.required" => "Обязательно указать почту",
            "phone.required" => "Обязательно указать телефон",
            "phone.regex" => "Неверный формат телефона (+7 999 999 99 99)"
        ];
    }
    
    public function attributes(): array {
        return [
            "name" => "Имя",
            "email" => "Почта",
            "phone" => "Номер телефона"
        ];
    }

    /**
     * 
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
}
