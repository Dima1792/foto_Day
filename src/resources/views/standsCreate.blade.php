@extends('layouts.photoDayBase')

@section('title', 'Создать площадку')

@section('content')
    <div class="max-w-3xl mx-auto bg-white p-8 rounded-2xl shadow-sm border border-slate-200">
        <div class="mb-8 border-b pb-4">
            <h1 class="text-2xl font-bold text-slate-800">Новая площадка</h1>
            <p class="text-slate-500">Заполните данные для привязки площадки к мероприятию</p>
        </div>
        <form action="{{ route('stands.store') }}" method="POST" class="space-y-6">
            @csrf
            <input type="hidden" name="meeting_id" value="{{ $meetingId }}">
            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Номер площадки (Code)</label>
                <input type="text" name="code" value="{{ old('code') }}"
                       class="w-full px-4 py-2.5 border @error('code') border-red-500 @else border-slate-300 @enderror rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none transition"
                       placeholder="Например: A-105">
                @error('code') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Статус (Status)</label>
                    <input type="text" name="status" value="{{ old('status', 'active') }}"
                           class="w-full px-4 py-2.5 border @error('status') border-red-500 @else border-slate-300 @enderror rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none transition"
                           placeholder="active">
                    @error('status') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1 text-slate-400">ID Мероприятия</label>
                    <input type="number" value="{{ $meetingId }}" disabled
                           class="w-full px-4 py-2.5 border border-slate-200 bg-slate-50 rounded-xl text-slate-400 cursor-not-allowed">
                    <p class="text-[10px] text-slate-400 mt-1 italic italic">Заполняется автоматически</p>
                </div>
            </div>
            <div class="pt-6 flex justify-end gap-3 border-t">
                <a href="{{ route('standList', ['stand' => $meetingId]) }}"
                   class="px-6 py-2.5 rounded-xl text-slate-600 hover:bg-slate-100 transition font-medium">
                    Отмена
                </a>
                <button type="submit"
                        class="px-8 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-bold shadow-md shadow-indigo-100 transition text-center">
                    Создать площадку
                </button>
            </div>
        </form>
    </div>
@endsection
