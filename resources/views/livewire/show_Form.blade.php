@extends('layouts.master')

@section('css')
<link href="{{ URL::asset('assets/css/wizard.css') }}" rel="stylesheet" id="bootstrap-css">
@stop

@section('title')
    {{trans('main_trans.Add_Parent')}}
@stop
@section('page-header')
<!-- breadcrumb -->
@section('PageTitle')
    {{trans('main_trans.Add_Parent')}}
@stop
<!-- breadcrumb -->
@endsection
@section('content')
<!-- row -->
<div class="row">
    <div class="col-md-12 mb-30">
        <div class="card card-statistics h-100">
            <div class="card-body">
               
                <livewire:add-parent/>
            </div>
        </div>
    </div>
</div>
<!-- row closed -->
@endsection
@section('js')
    @livewireScripts
@endsection
