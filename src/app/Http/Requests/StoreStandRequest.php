<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreStandRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }
    public function rules(): array
    {
        return [
            'code'         => 'required|string|max:255',
            'meeting_id'    => 'required|integer',
            'status'  => 'required|integer',

        ];
    }

    public function messages(): array
    {
        return [
            'code.required' => 'Введите код',
            'meeting_id'   => 'Введите номер мероприятия',
            'status' => 'Укажите статус',
        ];
    }
}
