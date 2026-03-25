@extends('layouts.photoDayBase')

@section('title', 'Создать мероприятие')

@section('content')
    <div class="container-center">
        <div class="header-box">
            <h1 class="title-main">Новое мероприятие</h1>
            <p class="subtitle">Все поля обязательны для заполнения</p>
        </div>

        <form action="{{ route('meetings.store') }}" method="POST">
            @csrf
            <div class="field-group">
                <label class="field-label">Название мероприятия</label>
                <input type="text" name="name" value="{{ old('name') }}"
                       class="field-input @error('name') input-invalid @enderror"
                       placeholder="Например: Свадьба Ивановых">
                @error('name') <div class="error-msg">{{ $message }}</div> @enderror
            </div>

            <div class="form-grid">
                <div class="field-group">
                    <label class="field-label">Ссылка (уникальный код)</label>
                    <input type="text" name="link" value="{{ old('link') }}"
                           class="field-input @error('link') input-invalid @enderror"
                           placeholder="ivanov-wedding-2024">
                    @error('link') <div class="error-msg">{{ $message }}</div> @enderror
                </div>
                <div class="field-group">
                    <label class="field-label">ID Агентства</label>
                    <input type="number" name="agency_id" value="{{ old('agency_id') }}"
                           class="field-input @error('agency_id') input-invalid @enderror"
                           placeholder="1">
                    @error('agency_id') <div class="error-msg">{{ $message }}</div> @enderror
                </div>
                <div class="field-group">
                    <label class="field-label">Дата и время начала</label>
                    <input type="datetime-local" name="date_start" value="{{ old('date_start') }}"
                           class="field-input @error('date_start') input-invalid @enderror">
                    @error('date_start') <div class="error-msg">{{ $message }}</div> @enderror
                </div>
                <div class="field-group">
                    <label class="field-label">Дата и время окончания</label>
                    <input type="datetime-local" name="date_end" value="{{ old('date_end') }}"
                           class="field-input @error('date_end') input-invalid @enderror">
                    @error('date_end') <div class="error-msg">{{ $message }}</div> @enderror
                </div>
                <div class="field-group">
                    <label class="field-label">Сумма по умолчанию</label>
                    <input type="text" name="sum_default" value="{{ old('sum_default', '0') }}"
                           class="field-input @error('sum_default') input-invalid @enderror">
                    @error('sum_default') <div class="error-msg">{{ $message }}</div> @enderror
                </div>
            </div>

            <div class="actions-bar">
                <a href="{{ route('meetingList') }}" class="btn-ui btn-ui-cancel">Отмена</a>
                <button type="submit" class="btn-ui btn-ui-save">Создать мероприятие</button>
            </div>
        </form>
    </div>
@endsection
