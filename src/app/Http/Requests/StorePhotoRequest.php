<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class StorePhotoRequest extends FormRequest
{
    public function authorize(): bool
    {
        return Auth::check();
    }
    public function rules(): array
    {
        return [
            'stand_id'  => 'required|exists:stands,id',
            'image'     => 'required|image|mimes:jpeg,png,jpg,gif|max:10240',
            'name_mini' => 'nullable|string|max:255',
        ];
    }

    public function messages(): array
    {
        return [
            'image.required' => 'Выберите файл для загрузки',
            'image.image' => 'Файл должен быть изображением',
            'stand_id.required' => 'Ошибка: не указан ID стенда',
        ];
    }
}
