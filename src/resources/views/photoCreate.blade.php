@extends('layouts.photoDayBase')

@section('title', 'Загрузка фото')

@section('content')
    <div class="container-center">
        <div class="header-box">
            <h1 class="title-main">Добавить фотографию</h1>
            <p class="subtitle">Площадка №{{ $standId }}</p>
        </div>

        {{-- ВАЖНО: enctype="multipart/form-data" обязателен для загрузки файлов! --}}
        <form action="{{ route('photo.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @if ($errors->any())
                <div class="error-msg" style="margin-bottom: 20px; padding: 10px; background: #fff1f2; border-radius: 8px;">
                    <strong>Ой, что-то не так:</strong>
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <input type="hidden" name="stand_id" value="{{ $standId }}">

            <div class="field-group">
                <label class="field-label">Выберите файл изображения</label>
                <input type="file" name="image" class="field-input @error('image') input-invalid @enderror" accept="image/*">
                @error('image') <div class="error-msg">{{ $message }}</div> @enderror
            </div>

            <div class="field-group">
                <label class="field-label">Название или описание (необязательно)</label>
                <input type="text" name="name_mini" class="field-input" placeholder="Например: Вид сбоку">
            </div>

            <div class="actions-bar">
                <a href="{{ route('photoList', ['photo' => $standId]) }}" class="btn-ui btn-ui-cancel">Отмена</a>
                <button type="submit" class="btn-ui btn-ui-save">Загрузить на сервер</button>
            </div>
        </form>
    </div>
@endsection
