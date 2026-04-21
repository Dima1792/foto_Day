@extends('layouts.photoDayBase')

@section('title', 'Площадки')

@push('actions')
    <a href="{{ route('stand.create', ['meeting_id' => request()->route('stand')]) }}" class="btn-ui btn-ui-save">
        + Добавить площадку
    </a>
@endpush

@section('content')
    <div class="header-box">
        <h1 class="title-main">Площадки мероприятия: {{ $Stands->first()->name ?? '...' }}</h1>
        <p class="subtitle">Выберите площадку для просмотра фото</p>
    </div>

    <div class="cards-grid">
        @forelse($Stands->whereNotNull('id') as $stand)
            <a href="{{ route('photoList', ['standId' => $stand->id]) }}" class="item-card">
                <div class="item-card-title">Площадка №{{ $stand->id }}</div>
            </a>
        @empty
            <div class="empty-state">Стендов пока нет. Добавьте первый!</div>
        @endforelse
    </div>
@endsection
