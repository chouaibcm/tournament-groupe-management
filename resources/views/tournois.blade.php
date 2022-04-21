@extends('layouts.app')
@section('css')
    <style>
        body {
            background: radial-gradient(#fff, #c5ff99);
        }

        .card-header {
            background-color: #ffdf99;
        }

        .card {
            border: solid 2px rgb(224, 206, 100)
        }

        /* .allteams span{
                    position: relative;
                    background-color: #ffdf99;
                padding: 2px 10px;
                font-size: 14px;
                border-radius: 20px;
                margin: 10px 11px;
                } */
        /* ------- */
        .btnjdid {
            display: inline-block;
            background: #3bff55;
            color: #fff;
            font-size: 20px;
            padding: 8px 30px;
            margin: 30px 0;
            border-radius: 30px;
            transition: background 0.5s;
        }

        .btnjdid:hover {
            background: #425634;
            color: #fff;
        }

        .allteams .badge {
            background-color: #ffdf99;
            color: #000;
        }

        .allteams i {
            color: #000;
        }

    </style>
@endsection
@section('content')
    <div class="equipes">
        <div class="container">
            <div class="row">
                <div class="col-md-2">
                    <img src="{{ asset('image/logo.png') }}" width="100%" alt="">
                </div>
                <div class="col-md-10">
                    <div class="card mt-3 mb-2">
                        <div class="card-header">
                            <div class="d-flex justify-content-between">
                                <h3 class="text-centre">الفرق المشاركة</h3>
                                <div class="btngr">
                                    <button class="btn btn-dark" data-bs-toggle="modal" data-bs-target="#categoryModal"><i
                                            class="fa fa-plus"></i>اضافة فريق</button>

                                    <button class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#teamsModal"><i
                                            class="fa fa-trash"></i>حذف جميع الفرق</button>
                                </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="allteams">
                                @foreach ($allteams as $team)
                                    <span class="badge fw-bold"><i class="bi bi-x-square-fill" data-bs-toggle="modal"
                                            data-bs-target="#delete{{ $team->id }}"></i> {{ $team->name }}</span> -

                                    <!--Delete Category-->
                                    <div class="modal fade" id="delete{{ $team->id }}" tabindex="-1"
                                        aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog">
                                            <div class="modal-content">
                                                <div class="modal-header">
                                                    <h5 class="modal-title" id="exampleModalLabel">
                                                        حذف الفريق</h5>
                                                    <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                        aria-label="Close"></button>
                                                </div>
                                                <form action="{{ route('teams.destroy', 'test') }}" method="post">
                                                    {{ method_field('Delete') }}
                                                    @csrf
                                                    <div class="modal-body">
                                                        هل انت متاكد من عملية الحذف ؟
                                                    </div>
                                                    <input id="id" type="hidden" name="id" class="form-control"
                                                        value="{{ $team->id }}">
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">اغلاق</button>
                                                        <button type="submit" class="btn btn-danger">تأكيد</button>
                                                    </div>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="select-team">
                <form action="{{ route('teams.update', 'test') }}" method="POST">
                    {{ method_field('patch') }}
                    @csrf
                    <div class="row">
                        <div class="col">
                            <label for="" class="fw-bold">الفريق:</label>
                            <select name="team" class="form-select">
                                @foreach ($allteams as $team)
                                    <option value="{{ $team->id }}">
                                        {{ $team->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col text-centre">
                            <label for="" class="fw-bold">المجموعة:</label>
                            <select name="groupe" id="" class="form-select">
                                <option value="1">A</option>
                                <option value="2">B</option>
                                <option value="3">C</option>
                                <option value="4">D</option>
                            </select>
                        </div>
                        <div class="col text-centre">
                            <button type="submit" class="btn btn-dark text-white mt-4">ظبط الفريق في المجموعة</button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="card mt-2 mb-2">
                <div class="card-header text-centre">
                    <h3>المجموعات</h3>
                </div>
                <div class="card-body">
                    {{-- ------------ Team A et B----------- --}}
                    <div class="row">
                        {{-- ------------ Team A ----------- --}}
                        <div class="col-md-6">
                            <table class="table">
                                <thead class="table-dark">
                                    <tr>
                                        <th>A</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    @foreach ($teamA as $team)
                                        <?php $i++; ?>
                                        <tr>
                                            <td class="fw-bold">
                                                <div class="d-flex justify-content-between">
                                                    A{{ $i }} --------> {{ $team->name }}
                                                    <i class="fa fa-trash" data-bs-toggle="modal"
                                                        data-bs-target="#deleteteamModal"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <!--update  team-->
                                        <div class="modal fade" id="deleteteamModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            حذف الفربق من المجموعة</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('teams.updateteam') }}" method="post">
                                                        {{ method_field('put') }}
                                                        @csrf
                                                        <div class="modal-body">
                                                            هل انت متاكد من عملية الحذف ؟
                                                        </div>
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                        value="{{ $team->id }}">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">اغلاق</button>
                                                            <button type="submit" class="btn btn-danger">تأكيد</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- ------------ Team B----------- --}}
                        <div class="col-md-6">
                            <table class="table">
                                <thead class="table-dark">
                                    <tr>
                                        <th>B</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    @foreach ($teamB as $team)
                                        <?php $i++; ?>
                                        <tr class="table-warning">
                                            <td class="fw-bold">
                                                <div class="d-flex justify-content-between">
                                                    B{{ $i }} --------> {{ $team->name }}
                                                    <i class="fa fa-trash" data-bs-toggle="modal"
                                                        data-bs-target="#deleteteamModal"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <!--update  team-->
                                        <div class="modal fade" id="deleteteamModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            حذف الفربق من المجموعة</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('teams.updateteam') }}" method="post">
                                                        {{ method_field('put') }}
                                                        @csrf
                                                        <div class="modal-body">
                                                            هل انت متاكد من عملية الحذف ؟
                                                        </div>
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                        value="{{ $team->id }}">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">اغلاق</button>
                                                            <button type="submit" class="btn btn-danger">تأكيد</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    {{-- ------------ Team C et D----------- --}}
                    <div class="row">
                        {{-- ------------ Team C ----------- --}}
                        <div class="col-md-6">
                            <table class="table">
                                <thead class="table-dark">
                                    <tr>
                                        <th>C</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    @foreach ($teamC as $team)
                                        <?php $i++; ?>
                                        <tr class="table-success">
                                            <td class="fw-bold">
                                                <div class="d-flex justify-content-between">
                                                    C{{ $i }} --------> {{ $team->name }}
                                                    <i class="fa fa-trash" data-bs-toggle="modal"
                                                        data-bs-target="#deleteteamModal"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <!--update  team-->
                                        <div class="modal fade" id="deleteteamModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            حذف الفربق من المجموعة</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('teams.updateteam') }}" method="post">
                                                        {{ method_field('put') }}
                                                        @csrf
                                                        <div class="modal-body">
                                                            هل انت متاكد من عملية الحذف ؟
                                                        </div>
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                        value="{{ $team->id }}">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">اغلاق</button>
                                                            <button type="submit" class="btn btn-danger">تأكيد</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        {{-- ------------ Team D----------- --}}
                        <div class="col-md-6">
                            <table class="table">
                                <thead class="table-dark">
                                    <tr>
                                        <th>D</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 0; ?>
                                    @foreach ($teamD as $team)
                                        <?php $i++; ?>
                                        <tr class="table-danger">
                                            <td class="fw-bold">
                                                <div class="d-flex justify-content-between">
                                                    D{{ $i }} --------> {{ $team->name }}
                                                    <i class="fa fa-trash" data-bs-toggle="modal"
                                                        data-bs-target="#deleteteamModal"></i>
                                                </div>
                                            </td>
                                        </tr>
                                        <!--update  team-->
                                        <div class="modal fade" id="deleteteamModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">
                                                            حذف الفربق من المجموعة</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <form action="{{ route('teams.updateteam') }}" method="post">
                                                        {{ method_field('put') }}
                                                        @csrf
                                                        <div class="modal-body">
                                                            هل انت متاكد من عملية الحذف ؟
                                                        </div>
                                                        <input id="id" type="hidden" name="id" class="form-control"
                                                        value="{{ $team->id }}">
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">اغلاق</button>
                                                            <button type="submit" class="btn btn-danger">تأكيد</button>
                                                        </div>
                                                    </form>
                                                </div>
                                            </div>
                                        </div>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
            <div class="accordion text-centre mb-2">
                {{--  --}}
                <p>
                    <a class="btnjdid" data-bs-toggle="collapse" href="#collapseExample" role="button"
                        aria-expanded="false" aria-controls="collapseExample">
                        رزنامة المبارايات
                    </a>
                <div class="collapse" id="collapseExample">
                    <div class="card card-body">
                        <img src="{{ asset('image/image1.jpg') }}" width="100%" alt="">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- categoryModal add model -->
    <div class="modal fade" id="categoryModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">اضافة الفرق المشاركة</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('teams.store') }}" method="POST">
                    @csrf
                    <div class="modal-body">
                        <!-- add_form -->
                        <div class="form-group">
                            <label>ادخل الفرق المشاركة تحت بعضها بالتسلسل</label>
                            <textarea name="name" id="code" cols="5" rows="5" class="form-control"></textarea>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">غلق</button>
                        <button type="submit" class="btn btn-primary">اضافة</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!--Delete Category-->
    <div class="modal fade" id="teamsModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">
                        حذف جميع الفرق</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form action="{{ route('teams.destroyAll', 'test') }}" method="post">
                    {{ method_field('Delete') }}
                    @csrf
                    <div class="modal-body">
                        هل انت متاكد من عملية الحذف ؟
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">اغلاق</button>
                        <button type="submit" class="btn btn-danger">تأكيد</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
