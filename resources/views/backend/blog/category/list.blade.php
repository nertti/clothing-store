@extends('backend.layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Список категорий</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('')}}">Панель управления</a></li>
                <li class="breadcrumb-item">Блог</li>
                <li class="breadcrumb-item">Категории</li>
                <li class="breadcrumb-item active">Список</li>
            </ol>
        </nav>
    </div><!-- End Page Title -->
    <section class="section">
        @include('layouts._message')
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-body">
{{--                        <h5 class="card-title">Table with hoverable rows</h5>--}}
                        <div class="control-buttons">
                            <a href="{{url('panel/blog/category/add/')}}" class="btn btn-primary">Добавить</a>
                        </div>
                        <!-- Table with hoverable rows -->
                        <table class="table table-hover datatable ">
                            <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">Заголовок</th>
                                <th scope="col">URL</th>
                                <th scope="col">Статус</th>
                                <th scope="col">Дата создания</th>
                                <th scope="col" data-sortable="false">Управление</th>
                            </tr>
                            </thead>
                            <tbody>
                            @forelse($getRecord as $value)
                                <tr>
                                    <th scope="row">{{$value->id}}</th>
                                    <td>{{$value->name}}</td>
                                    <td>{{$value->slug}}</td>
                                    <td>
                                        @if($value->status === 1)
                                            <span class="badge bg-success">Активен</span>
                                        @else
                                            <span class="badge bg-danger">Не активен</span>
                                        @endif
                                    </td>
                                    <td>{{ date('d.m.Y H:i', strtotime($value->created_at)) }}</td>
                                    <td>
                                        <a href="{{url('panel/blog/category/edit/' . $value->id)}}" class="btn btn-warning">
                                            <i class="bi bi-pencil-square"></i>
                                        </a>
                                        <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletcategory{{$value->id}}">
                                            <i class="bi bi-trash"></i>
                                        </button>
                                        <div class="modal fade" id="deletcategory{{$value->id}}" tabindex="-1" style="display: none;" aria-hidden="true">
                                            <div class="modal-dialog modal-dialog-centered">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title">Подтвердите</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        Вы действительно хотите удалить категорию?<br>
                                                        Это действие невозможно будет отменить!
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                                        <a href="{{url('panel/blog/category/delete/' . $value->id)}}" class="btn btn-danger">Удалить</a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </td>
                                </tr>
                                @empty
                                    <tr>
                                        <td colspan="6">Записей не найдено</td>
                                    </tr>
                            @endforelse
                            </tbody>
                        </table>
                        <!-- End Table with hoverable rows -->
{{--                        {!! $getRecord->appends(\Illuminate\Support\Facades\Request::except('page'))->links() !!}--}}
                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
