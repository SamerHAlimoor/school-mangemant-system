@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
    {{trans('main_trans.list_Promotions')}}
@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.list_Promotions')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->
    <div class="row">
        <div class="col-md-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="col-xl-12 mb-30">
                        <div class="card card-statistics h-100">
                            <div class="card-body">

                                <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#Delete_all">
                                      {{trans('Students_trans.undo_all')}} 
                                </button>
                                <br><br>


                                <div class="table-responsive">
                                    <table id="datatable" class="table  table-hover table-sm table-bordered p-0"
                                           data-page-length="45"
                                           style="text-align: center">
                                        <thead>
                                        <tr>
                                            <th class="alert-info">#</th>
                                            <th class="alert-info">{{trans('Students_trans.name')}}</th>
                                            <th class="alert-danger">{{trans('Students_trans.previous_school_stage')}}</th>
                                            <th class="alert-danger">{{trans('Students_trans.previous_school_year')}}</th>
                                            <th class="alert-danger">{{trans('Students_trans.previous_class')}}</th>
                                            <th class="alert-danger">{{trans('Students_trans.previous_section')}}</th>
                                            <th class="alert-danger">{{trans('Students_trans.current_school_stage')}}</th>
                                            <th class="alert-danger">{{trans('Students_trans.new_school_year')}}</th>
                                            <th class="alert-danger">{{trans('Students_trans.current_class')}}</th>
                                            <th class="alert-danger">{{trans('Students_trans.current_section')}}</th>
                                            <th>{{trans('Students_trans.Processes')}}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @foreach($promotions as $promotion)
                                            <tr>
                                                <td>{{ $loop->index+1 }}</td>
                                                <td>{{$promotion->student->name}}</td>
                                                <td>{{$promotion->f_grade->name}}</td>
                                                <td>{{$promotion->academic_year}}</td>
                                                <td>{{$promotion->f_classroom->name_class}}</td>
                                                <td>{{$promotion->f_section->name_section}}</td>
                                                <td>{{$promotion->t_grade->name}}</td>
                                                <td>{{$promotion->academic_year_new}}</td>
                                                <td>{{$promotion->t_classroom->name_class}}</td>
                                                <td>{{$promotion->t_section->name_section}}</td>
                                                <td>
                                                    <div class="dropdown show">
                                                        <a class="btn btn-success btn-sm dropdown-toggle" href="#" role="button" id="dropdownMenuLink" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                                            {{trans('Students_trans.Processes')}}                                                      
                                                          </a>
                                                        <div class="dropdown-menu" aria-labelledby="dropdownMenuLink">
                                                            <a class="dropdown-item"  data-toggle="modal"  data-target="#Delete_one{{$promotion->id}}"><i style="color: #ffc107" class="far fa-eye "></i>&nbsp; {{trans('Students_trans.student_return')}}</a>
                                                            <a class="dropdown-item"  data-toggle="modal" data-target="#graduation_student{{ $promotion->id }}"><i style="color:green" class="fa fa-edit"></i>&nbsp;  {{trans('Students_trans.Student_graduation')}}</a>
                                                            </div>
                                                    </div>
                                                   
                                                </td>
                                            </tr>
                                   @include('pages.Students.promotion.Delete_all')
                                   @include('pages.Students.promotion.Delete_one')
                                   @include('pages.Students.promotion.graduation')

                                        @endforeach
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection