@extends('layouts.photoDayBase')

@section('title', 'Фотографии площадки')

@push('actions')
    <a href="{{ route('loadPhoto', ['stand_id' => request()->route('photo')]) }}" class="btn-ui btn-ui-save">
        + Добавить фото
    </a>
@endpush

@section('content')
    <div class="header-box">
        <div style="display: flex; align-items: center; gap: 1rem;">
            <div>
                <h1 class="title-main">
                    Фотографии стенда №{{ $Photos->first()->stand_id ?? request()->route('photo') }}
                    @if($Photos->isNotEmpty() && $Photos->first()->name)
                        <span style="color: #64748b; font-weight: 400;">— {{ $Photos->first()->name }}</span>
                    @endif
                </h1>
                <p class="subtitle">Нажмите на карточку, чтобы открыть оригинал изображения</p>
            </div>
        </div>
    </div>

    <div class="cards-grid">
        @forelse($Photos as $photo)
            <a href="{{ asset('storage/' . $photo->real_name_full) }}"
               target="_blank"
               class="item-card"
               style="padding: 0; overflow: hidden; display: flex; flex-direction: column; text-decoration: none;">
                <div style="width: 100%; height: 220px; background: #f8fafc; overflow: hidden;">
                    <img src="{{ asset('storage/' . $photo->real_name_full) }}"
                         alt="{{ $photo->name_mini }}"
                         style="width: 100%; height: 100%; object-fit: cover; display: block;"
                         onerror="this.onerror=null; this.src='https://placehold.co';">
                </div>
                <div style="padding: 1.25rem; flex-grow: 1; border-top: 1px solid #f1f5f9;">
                    <div class="item-card-title" style="margin-bottom: 0.5rem; color: #4f46e5; font-size: 1.05rem;">
                        {{ $photo->name_mini }}
                    </div>
                    <div style="display: flex; justify-content: space-between; align-items: center;">
                        <span class="item-card-badge">ID: {{ $photo->id }}</span>
                        <span style="font-size: 0.75rem; color: #94a3b8;">Открыть оригинал ↗</span>
                    </div>
                </div>
            </a>
        @empty
            <div class="empty-state">
                <div style="font-size: 3rem; margin-bottom: 1rem;">📷</div>
                <p>На этой площадке пока нет загруженных фотографий.</p>
                <p style="font-size: 0.875rem; margin-top: 0.5rem;">Нажмите кнопку «Добавить фото», чтобы загрузить первый снимок.</p>
            </div>
        @endforelse
    </div>
@endsection
