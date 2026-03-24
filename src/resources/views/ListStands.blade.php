@extends('layouts.photoDayBase')

@section('title', 'Площадки для мероприятия . ($Stands->first()->name. :')
@push('actions')
    <a href="{{ route('stand.create', ['meeting_id' => $Stands->first()->meeting_id ?? request()->route('stand')])}}"
       class="bg-indigo-600 hover:bg-indigo-700 text-white px-4 py-2 rounded-lg text-sm font-semibold transition shadow-sm flex items-center gap-2">
        Добавить площадку
    </a>
@endpush

@section('content')
    <div class="mb-8">
        <h1 class="text-3xl font-bold text-slate-800">Площадки для мероприятия {{$Stands[0]->name}}:</h1>
        <p class="text-slate-500 mt-2">Ну что есть из того и выбирай, чтобы просмотреть доступные фото</p>
        <p class="text-slate-500 mt-2">Ну а если совсем ничего не приглянулось создай новую площадку</p>
    </div>

    <div class="grid gap-4 md:grid-cols-2 lg:grid-cols-3">
        @forelse($Stands->whereNotNull('id') as $stand)
            <a href="{{ route('photoList', ['stand' => $stand->id]) }}"
               class="group block p-6 bg-white border border-slate-200 rounded-xl shadow-sm hover:border-indigo-500 hover:shadow-md transition-all duration-300">

                <div class="flex items-center justify-between">
                    <span class="text-lg font-semibold text-slate-700 group-hover:text-indigo-600">
                        {{ $stand->id }}
                    </span>
                </div>

                <div class="mt-4 flex items-center text-xs text-slate-400 uppercase tracking-wider font-bold">
                    <span class="bg-slate-100 px-2 py-1 rounded">ID: {{ $stand->id}}</span>
                </div>
            </a>
        @empty
            <div class="col-span-full p-12 bg-white border-2 border-dashed border-slate-200 rounded-2xl text-center">
                <p class="text-slate-400">Список сткндов пока пуст</p>
            </div>
        @endforelse
    </div>
@endsection
