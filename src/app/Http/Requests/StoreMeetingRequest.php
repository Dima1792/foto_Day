<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StoreMeetingRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }
    public function rules(): array
    {
        return [
            'name'         => 'required|string|max:255',
            'link'         => 'required|string|unique:meetings,link',
            'agency_id'    => 'required|integer',
            'sum_default'  => 'nullable|string',
            'date_start'   => 'required|date',
            'date_end'     => 'required|date|after_or_equal:date_start',
        ];
    }

    public function messages(): array
    {
        return [
            'name.required' => 'Введите название мероприятия',
            'link.unique'   => 'Такая ссылка уже занята',
            'date_end.after' => 'Мероприятие не может закончиться раньше, чем начнется',
        ];
    }
}
