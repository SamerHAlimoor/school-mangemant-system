@extends('layouts.master')
@section('css')
    @toastr_css
@section('title')
{{ trans('main_trans.Attendance_absence_section') }}@stop
@endsection
@section('page-header')
    <!-- breadcrumb -->
@section('PageTitle')
{{ trans('main_trans.Attendance_absence_section') }}@stop
<!-- breadcrumb -->
@endsection
@section('content')
    <!-- row -->

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    @if (session('status'))
        <div class="alert alert-danger">
            <ul>
                <li>{{ session('status') }}</li>
            </ul>
        </div>
    @endif

<div class="row">
    <div class="col-sm-6 text-left">
        <h5 style="font-family: 'Cairo', sans-serif;color: red" class="text-left">  {{ trans('main_trans.today') }} : {{ $nameofDay }}</h5>

    </div>
    <div class="col-sm-6 text-right">
        <h5 style="font-family: 'Cairo', sans-serif;color: rgb(37, 151, 33)"> {{ trans('main_trans.date') }} : {{ date('l j F Y') }}</h5>

    </div>
    
</div>

   
    <form method="post" action="{{ route('Attendance.store') }}">

        @csrf
        <table id="datatable" class="table  table-hover table-sm table-bordered p-0" data-page-length="50"
               style="text-align: center">
            <thead>
            <tr>
                <th class="alert-success">#</th>
                <th class="alert-success">{{ trans('Students_trans.name') }}</th>
                <th class="alert-success">{{ trans('Students_trans.email') }}</th>
                <th class="alert-success">{{ trans('Students_trans.gender') }}</th>
                <th class="alert-success">{{ trans('Students_trans.Grade') }}</th>
                <th class="alert-success">{{ trans('Students_trans.classrooms') }}</th>
                <th class="alert-success">{{ trans('Students_trans.section') }}</th>
                <th class="alert-success">{{ trans('Students_trans.Processes') }}</th>
            </tr>
            </thead>
            <tbody>
            @foreach ($students as $student)
                <tr>
                    <td>{{ $loop->index + 1 }}</td>
                    <td>{{ $student->name }}</td>
                    <td>{{ $student->email }}</td>
                    <td>{{ $student->genders->name }}</td>
                    <td>{{ $student->Grade->name }}</td>
                    <td>{{ $student->Classrooms->name_class }}</td>
                    <td>{{ $student->Sections->name_section }}</td>
                    <td>

                        @if(isset($student->attendance()->where('attendence_date',date('Y-m-d'))->first()->student_id))

                            <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                <input name="attendences[{{ $student->id }}]" disabled
                                       {{ $student->attendance()->first()->attendence_status == 1 ? 'checked' : '' }}
                                       class="leading-tight" type="radio" value="presence">
                                <span class="text-success">{{ trans('main_trans.Attendanc') }} </span>
                            </label>

                            <label class="ml-4 block text-gray-500 font-semibold">
                                <input name="attendences[{{ $student->id }}]" disabled
                                       {{ $student->attendance()->first()->attendence_status == 0 ? 'checked' : '' }}
                                       class="leading-tight" type="radio" value="absent">
                                <span class="text-danger">{{ trans('main_trans.Absence') }} </span>
                            </label>

                        @else

                            <label class="block text-gray-500 font-semibold sm:border-r sm:pr-4">
                                <input name="attendences[{{ $student->id }}]" class="leading-tight" type="radio"
                                       value="presence">
                                <span class="text-success">{{ trans('main_trans.Attendanc') }} </span>
                            </label>

                            <label class="ml-4 block text-gray-500 font-semibold">
                                <input name="attendences[{{ $student->id }}]" class="leading-tight" type="radio"
                                       value="absent">
                                <span class="text-danger">{{ trans('main_trans.absence') }} </span>
                            </label>

                        @endif

                        <input type="hidden" name="student_id[]" value="{{ $student->id }}">
                        <input type="hidden" name="grade_id" value="{{ $student->grade_id }}">
                        <input type="hidden" name="classroom_id" value="{{ $student->classroom_id }}">
                        <input type="hidden" name="section_id" value="{{ $student->section_id }}">

                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
        <P>
            <button class="btn btn-success" type="submit">{{ trans('Students_trans.submit') }}</button>
        </P>
    </form><br>
    <!-- row closed -->
@endsection
@section('js')
    @toastr_js
    @toastr_render
@endsection