@extends('layouts.photoDayBase')

@section('title', 'Список мероприятий')
@push('actions')
    <a href="{{ route('meeting.create') }}"
       class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm font-semibold transition shadow-sm flex items-center gap-2">
                Добавить мероприятие
    </a>
@endpush

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-slate-800">Актуальные мероприятия</h1>
        <p class="text-slate-500 mt-2">Ну что есть из того и выбирай, чтобы просмотреть доступные стенды</p>
        <p class="text-slate-500 mt-2">Ну а если совсем ничего не приглянулось создай новое мероприятие</p>
    </div>

    <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
        @forelse($meetings as $meeting)
            <a href="{{ route('standList', ['stand' => $meeting->id]) }}"
               class="group block p-6 bg-white border border-slate-200 rounded-xl shadow-sm hover:border-indigo-500 hover:shadow-md transition-all duration-300">

                <div class="flex items-center justify-between">
                    <span class="text-lg font-semibold text-slate-700 group-hover:text-indigo-600">
                        {{ $meeting->name }}
                </div>

                <div class="mt-4 flex items-center text-xs text-slate-400 uppercase tracking-wider font-bold">
                    <span class="bg-slate-100 px-2 py-1 rounded">ID: {{ $meeting->id }}</span>
                </div>
            </a>
        @empty
            <div class="col-span-full p-12 bg-white border-2 border-dashed border-slate-200 rounded-2xl text-center">
                <p class="text-slate-400">Список мероприятий пока пуст</p>
            </div>
        @endforelse
    </div>
@endsection
