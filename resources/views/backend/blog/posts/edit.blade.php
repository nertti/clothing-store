@extends('backend.layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Изменить пост</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('')}}">Панель управления</a></li>
                <li class="breadcrumb-item">Посты</li>
                <li class="breadcrumb-item active">Изменить пост</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->

    <section class="section">
        @include('layouts._message')
        <form class="row g-3" action="" method="post" novalidate enctype="multipart/form-data">
            {{csrf_field()}}
            <div class="col-8">
                <label for="name" class="form-label">Заголовок</label>
                <input id="name" type="text" name="name" value="{{ $getRecord->name }}" required
                       class="form-control">
            </div>
            <div class="col-4">
                <label for="slug" class="form-label">URL</label>
                <div class="input-group mb-3">
                                    <span class="input-group-text"
                                          id="slug-addon">https://example.com/blog/category/</span>
                    <input id="slug" type="text" name="slug" value="{{ $getRecord->slug }}" required
                           class="form-control">
                </div>
            </div>
            <div class="col-12">
                <div class="form-floating">
                    <select class="form-select" id="floatingSelect"
                            aria-label="Floating label select example" name="id_category">
                        @foreach($getCategory as $value)
                            @if($value->id == $getRecord->id_category)
                                <option selected="" value="{{$value->id}}">{{$value->name}}</option>
                            @else
                                <option value="{{$value->id}}">{{$value->name}}</option>
                            @endif
                        @endforeach
                    </select>
                    <label for="floatingSelect">Категория</label>
                </div>
            </div>
            <div class="col-3">
                @if(!empty($getRecord->getImage()))
                    <img src="{{$getRecord->getImage()}}" alt="{{$getRecord->name}}" class="col-12">
                @endif
            </div>
            <div class="col-9">
                <label for="formFile" class="col-sm-6 col-form-label">Изображение (Если хотите заменить, загрузите новое)</label>
                <input class="form-control" type="file" id="formFile" name="image" value="{{ $getRecord->image }}">
            </div>
            <div class="col-12">
                <label for="description" class="col-sm-2 col-form-label">Контент</label>
                <textarea class="tinymce-editor" id="description" name="description">{{ $getRecord->description }}</textarea>
            </div>
            <br>
            <hr>
            <div class="col-6">
                <label for="meta_title" class="form-label">Meta заголовок</label>
                <input id="meta_title" type="text" name="meta_title" value="{{ $getRecord->meta_title }}"
                       required class="form-control">
            </div>
            <div class="col-6">
                <label for="meta_keys" class="form-label">Meta ключевые слова</label>
                <input id="meta_keys" type="text" name="meta_keys" value="{{ $getRecord->meta_keys }}" required
                       class="form-control">
            </div>
            <div class="col-12">
                <label for="meta_desc" class="form-label">Meta описание</label>
                <textarea id="meta_desc" name="meta_desc" required
                          class="form-control">{{ $getRecord->meta_desc }}</textarea>
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input class="form-check-input" name="status" type="checkbox" value="1"
                           id="invalidCheck2" required {{ ($getRecord->status  == 1) ? 'checked' : '' }}>
                    <label class="form-check-label" for="invalidCheck2">
                        Активность
                    </label>
                </div>
            </div>
            <input hidden="" type="text" name="id_user" value="{{ Auth::user()->id }}">
            <div class="text-center">
                <button type="submit" class="btn btn-success">Сохранить</button>
                <button type="reset" class="btn btn-outline-secondary">Сбросить</button>
                <a href="{{url('panel/blog/posts/')}}" class="btn btn-secondary">Назад</a>
            </div>
        </form>
    </section>
@endsection
