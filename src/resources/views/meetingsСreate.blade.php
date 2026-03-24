@extends('layouts.photoDayBase')

@section('title', 'Создать мероприятие')

@section('content')
    <div class="max-w-3xl mx-auto bg-white p-8 rounded-2xl shadow-sm border border-slate-200">
        <div class="mb-8 border-b pb-4">
            <h1 class="text-2xl font-bold text-slate-800">Новое мероприятие</h1>
            <p class="text-slate-500">Заполните технические и организационные данные</p>
        </div>

        <form action="{{ route('meetings.store') }}" method="POST" class="space-y-6">
            @csrf

            <div>
                <label class="block text-sm font-semibold text-slate-700 mb-1">Название мероприятия</label>
                <input type="text" name="name" value="{{ old('name') }}"
                       class="w-full px-4 py-2.5 border @error('name') border-red-500 @else border-slate-300 @enderror rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none transition"
                       placeholder="Global IT Forum">
                @error('name') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Ссылка (Slug)</label>
                    <input type="text" name="link" value="{{ old('link') }}"
                           class="w-full px-4 py-2.5 border @error('link') border-red-500 @else border-slate-300 @enderror rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none transition"
                           placeholder="it-forum-2024">
                    @error('link') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>

                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Сумма (sum_default)</label>
                    <input type="text" name="sum_default" value="{{ old('sum_default') }}"
                           class="w-full px-4 py-2.5 border @error('sum_default') border-red-500 @else border-slate-300 @enderror rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none transition"
                           placeholder="5000">
                    @error('sum_default') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Дата начала</label>
                    <input type="datetime-local" name="date_start" value="{{ old('date_start') }}"
                           class="w-full px-4 py-2.5 border @error('date_start') border-red-500 @else border-slate-300 @enderror rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none transition">
                    @error('date_start') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">Дата окончания</label>
                    <input type="datetime-local" name="date_end" value="{{ old('date_end') }}"
                           class="w-full px-4 py-2.5 border @error('date_end') border-red-500 @else border-slate-300 @enderror rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none transition">
                    @error('date_end') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
                <div>
                    <label class="block text-sm font-semibold text-slate-700 mb-1">ID Агентства</label>
                    <input type="number" name="agency_id" value="{{ old('agency_id') }}"
                           class="w-full px-4 py-2.5 border @error('agency_id') border-red-500 @else border-slate-300 @enderror rounded-xl focus:ring-2 focus:ring-indigo-500 outline-none transition">
                    @error('agency_id') <p class="text-red-500 text-xs mt-1">{{ $message }}</p> @enderror
                </div>
            </div>
            <div class="pt-6 flex justify-end gap-3">
                <a href="{{ route('meetingList') }}" class="px-6 py-2.5 rounded-xl text-slate-600 hover:bg-slate-100 transition font-medium">
                    Отмена
                </a>
                <button type="submit" class="px-8 py-2.5 bg-indigo-600 hover:bg-indigo-700 text-white rounded-xl font-bold shadow-md shadow-indigo-100 transition">
                    Создать мероприятие
                </button>
            </div>
        </form>
    </div>
@endsection
