@extends('layouts.photoDayBase')

@section('title', 'Все мероприятия')

@push('actions')
    <a href="{{ route('meeting.create') }}" class="btn-ui btn-ui-save">
        + Добавить мероприятие
    </a>
@endpush

@section('content')
    <div class="header-box">
        <h1 class="title-main">Мероприятия</h1>
        <p class="subtitle">Выберите событие для работы с площадками</p>
    </div>

    <div class="cards-grid">
        @forelse($meetings as $meeting)
            <a href="{{ route('standList', ['stand' => $meeting->id]) }}" class="item-card">
                <div class="item-card-title">{{ $meeting->name }}</div>
                <div class="item-card-badge">ID: {{ $meeting->id }}</div>
            </a>
        @empty
            <div class="empty-state">
                <p>Мероприятий пока нет.</p>
                <a href="{{ route('meetings.create') }}" class="text-indigo-600 font-semibold underline">Создайте первое!</a>
            </div>
        @endforelse
    </div>
@endsection

