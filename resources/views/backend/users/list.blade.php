@extends('backend.layouts.app')
@section('content')
    <div class="pagetitle">
        <h1>Список пользователей</h1>
        <nav>
            <ol class="breadcrumb">
                <li class="breadcrumb-item"><a href="{{url('')}}">Панель управления</a></li>
                <li class="breadcrumb-item">Пользователи</li>
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
                        <ul class="nav nav-pills mb-3" id="myTab" role="tablist">
                            <li class="nav-item pr-3" role="presentation">
                                <button class="nav-link active" id="default-users-tab" data-bs-toggle="tab" data-bs-target="#default-users" type="button" role="tab" aria-controls="default-users" aria-selected="false" tabindex="-1">Обычные</button>
                            </li>
                            <li class="nav-item pr-3" role="presentation">
                                <button class="nav-link" id="admin-users-tab" data-bs-toggle="tab" data-bs-target="#admin-users" type="button" role="tab" aria-controls="admin-users" aria-selected="false" tabindex="-1">Администраторы</button>
                            </li>
                            <a href="{{url('panel/users/add/')}}" class="btn btn-outline-primary">Добавить</a>
                        </ul>
                        <div class="tab-content pt-2" id="myTabContent">
                            <div class="tab-pane fade active show" id="default-users" role="tabpanel" aria-labelledby="default-users-tab">
                                <!-- Table with hoverable rows -->
                                <table class="table table-hover datatable ">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Имя</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Подтверждён</th>
                                        <th scope="col">Дата регистрации</th>
                                        <th scope="col" data-sortable="false">Управление</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($getRecord as $value)
                                        <tr>
                                            <th scope="row">{{$value->id}}</th>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->email}}</td>
                                            <td>{{!empty($value->id) ? 'Да' : 'Нет'}}</td>
                                            <td>{{ date('d.m.Y H:i', strtotime($value->created_at)) }}</td>
                                            <td>
                                                <a href="{{url('panel/users/edit/' . $value->id)}}" class="btn btn-warning">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletuser{{$value->id}}">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                                <div class="modal fade" id="deletuser{{$value->id}}" tabindex="-1" style="display: none;" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Подтвердите</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Вы уверены что хотите удалить пользователя?<br>
                                                                Это действие невозможно будет отменить!
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                                                <a href="{{url('panel/users/delete/' . $value->id)}}" class="btn btn-danger">Удалить</a>
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
{{--                                {!! $getRecord->appends(['page_record' => 'default_users'])->links() !!}--}}
                            </div>
                            <div class="tab-pane fade" id="admin-users" role="tabpanel" aria-labelledby="admin-users-tab">
                                <!-- Table with hoverable rows -->
                                <table class="table table-hover datatable ">
                                    <thead>
                                    <tr>
                                        <th scope="col">#</th>
                                        <th scope="col">Имя</th>
                                        <th scope="col">Email</th>
                                        <th scope="col">Подтверждён</th>
                                        <th scope="col">Дата регистрации</th>
                                        <th scope="col" data-sortable="false">Управление</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    @forelse($getRecordAdmin as $value)
                                        <tr>
                                            <th scope="row">{{$value->id}}</th>
                                            <td>{{$value->name}}</td>
                                            <td>{{$value->email}}</td>
                                            <td>{{!empty($value->id) ? 'Да' : 'Нет'}}</td>
                                            <td>{{ date('d.m.Y H:i', strtotime($value->created_at)) }}</td>
                                            <td>
                                                <a href="{{url('panel/users/edit/' . $value->id)}}" class="btn btn-warning">
                                                    <i class="bi bi-pencil-square"></i>
                                                </a>
                                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletuser{{$value->id}}">
                                                    <i class="bi bi-trash"></i>
                                                </button>
                                                <div class="modal fade" id="deletuser{{$value->id}}" tabindex="-1" style="display: none;" aria-hidden="true">
                                                    <div class="modal-dialog modal-dialog-centered">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title">Подтвердите</h5>
                                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                Вы уверены что хотите удалить пользователя?<br>
                                                                Это действие невозможно будет отменить!
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Закрыть</button>
                                                                <a href="{{url('panel/users/delete/' . $value->id)}}" class="btn btn-danger">Удалить</a>
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
{{--                                {!! $getRecordAdmin->appends(['page_record' => 'second'])->links() !!}--}}
                            </div>
                        </div><!-- End Default Tabs -->

                    </div>
                </div>

            </div>
        </div>
    </section>
@endsection
