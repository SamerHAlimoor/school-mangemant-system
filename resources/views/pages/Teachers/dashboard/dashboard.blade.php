<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="keywords" content="HTML5 Template" />
    <meta name="description" content="Webmin - Bootstrap 4 & Angular 5 Admin Dashboard Template" />
    <meta name="author" content="potenzaglobalsolutions.com" />
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
    @include('layouts.head')
    @toastr_css

</head>

<body>

    <div class="wrapper">

        <!--=================================
 preloader -->

        <div id="pre-loader">

            <img src="{{ URL::asset('assets/images/pre-loader/loader-01.svg') }}" alt="">
        </div>

        <!--=================================
 preloader -->

        @include('layouts.main-header')

        @include('layouts.main-sidebar')

        <!--=================================
 Main content -->
 <div class="content-wrapper">
    <div class="page-title" >
        <div class="row">
            <div class="col-sm-6" >
                <h4 class="mb-0" style="font-family: 'Cairo', sans-serif">Teacher Dashboard</h4>
            </div>
            <div class="col-sm-6">
                <ol class="breadcrumb pt-0 pr-0 float-left float-sm-right">
                </ol>
            </div>
        </div>
    </div>
    <!-- widgets -->
    <div class="row" >
        <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <span class="text-success">
                                <i class="fas fa-user-graduate highlight-icon" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="float-right text-right">
                            <p class="card-text text-dark font-weight-light">{{ trans('main_trans.number_of_students') }}</p>
                            <h4 class="font-weight-bold text-center">{{\App\Models\Student::count()}}</h4>
                        </div>
                    </div>
                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                        <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="{{route('Students.index')}}" target="_blank"><span class="text-danger">{{ trans('main_trans.Display_data') }}</span></a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <span class="text-warning">
                                <i class="fas fa-chalkboard-teacher highlight-icon" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="float-right text-right">
                            <p class="card-text text-dark font-weight-light">{{ trans('main_trans.number_of_teachers') }}</p>
                            <h4 class="font-weight-bold text-center">{{\App\Models\Teacher::count()}}</h4>
                        </div>
                    </div>
                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                        <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="{{route('Teacher.index')}}" target="_blank"><span class="text-danger">{{ trans('main_trans.Display_data') }}</span></a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix">
                        <div class="float-left">
                            <span class="text-success">
                                <i class="fas fa-user-tie highlight-icon" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="float-right text-right">
                            <p class="card-text text-dark font-weight-light">{{ trans('main_trans.number_of_parents') }}</p>
                            <h4 class="font-weight-bold text-center">{{\App\Models\MyParent::count()}}</h4>
                        </div>
                    </div>
                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                        <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="{{route('add_parent')}}" target="_blank"><span class="text-danger">{{ trans('main_trans.Display_data') }}</span></a>
                    </p>
                </div>
            </div>
        </div>
        <div class="col-xl-6 col-lg-6 col-md-6 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="clearfix ">
                        <div class="float-left">
                            <span class="text-primary">
                                <i class="fas fa-chalkboard highlight-icon" aria-hidden="true"></i>
                            </span>
                        </div>
                        <div class="float-right text-left font-weight-light">
                            <p class="card-text text-dark  ">{{ trans('main_trans.number_of_classes') }}</p>
                            <h4 class="font-weight-bold text-center">{{\App\Models\Section::count()}}</h4>
                        </div>
                    </div>
                    <p class="text-muted pt-3 mb-0 mt-2 border-top">
                        <i class="fas fa-binoculars mr-1" aria-hidden="true"></i><a href="{{route('Sections.index')}}" target="_blank"><span class="text-danger">{{ trans('main_trans.Display_data') }}</span></a>
                    </p>
                </div>
            </div>
        </div>
    </div>
    <!-- Orders Status widgets-->


    <div class="row">

        <div  style="height: 400px;" class="col-xl-12 mb-30">
            <div class="card card-statistics h-100">
                <div class="card-body">
                    <div class="tab nav-border" style="position: relative;">
                        <div class="d-block d-md-flex justify-content-between">
                            <div class="d-block w-100">
                                <h5 style="font-family: 'Cairo', sans-serif" class="card-title">{{ trans('main_trans.last_operations_on_the_system') }}</h5>
                            </div>
                            <div class="d-block d-md-flex nav-tabs-custom">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">

                                    <li class="nav-item">
                                        <a class="nav-link active show" id="students-tab" data-toggle="tab"
                                           href="#students" role="tab" aria-controls="students"
                                           aria-selected="true"> {{ trans('main_trans.the_students') }}</a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="teachers-tab" data-toggle="tab" href="#teachers"
                                           role="tab" aria-controls="teachers" aria-selected="false">
                                           {{ trans('main_trans.teachers') }}                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="parents-tab" data-toggle="tab" href="#parents"
                                           role="tab" aria-controls="parents" aria-selected="false">
                                           {{ trans('main_trans.Parents') }}
                                        </a>
                                    </li>

                                    <li class="nav-item">
                                        <a class="nav-link" id="fee_invoices-tab" data-toggle="tab" href="#fee_invoices"
                                           role="tab" aria-controls="fee_invoices" aria-selected="false">
                                           {{ trans('main_trans.Invoices') }}
                                        </a>
                                    </li>

                                </ul>
                            </div>
                        </div>
                        <div class="tab-content" id="myTabContent">

                            {{--students Table--}}
                            <div class="tab-pane fade active show" id="students" role="tabpanel" aria-labelledby="students-tab">
                                <div class="table-responsive mt-15">
                                    <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                        <thead>
                                        <tr  class="table-info text-danger">
                                            <th>#</th>
                                            <th>{{ trans('main_trans.students_name') }}</th>
                                            <th>{{ trans('main_trans.email') }}</th>
                                            <th>{{ trans('main_trans.Type') }}</th>
                                            <th>{{ trans('main_trans.Educational_level') }}</th>
                                            <th>{{ trans('main_trans.Classroom') }}</th>
                                            <th>{{ trans('main_trans.Section') }}</th>
                                            <th>{{ trans('main_trans.Added_date') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse(\App\Models\Student::latest()->take(10)->get() as $student)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$student->name}}</td>
                                                <td>{{$student->email}}</td>
                                                <td>{{$student->genders->name}}</td>
                                                <td>{{$student->Grade->name}}</td>
                                                <td>{{$student->Classrooms->name_class}}</td>
                                                <td>{{$student->Sections->name_section}}</td>
                                                <td class="text-success">{{$student->created_at}}</td>
                                                @empty
                                                    <td class="alert-danger" colspan="8">{{ trans('main_trans.no_data') }}</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            {{--teachers Table--}}
                            <div class="tab-pane fade" id="teachers" role="tabpanel" aria-labelledby="teachers-tab">
                                <div class="table-responsive mt-15">
                                    <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                        <thead>
                                        <tr  class="table-info text-danger">
                                            <th>#</th>
                                            <th>{{ trans('main_trans.name') }}</th>
                                            <th>{{ trans('main_trans.email') }}</th>
                                            <th>{{ trans('main_trans.Type') }}</th>
                                            <th>{{ trans('main_trans.Specialization') }}</th>
                                            <th>{{ trans('main_trans.Date_of_hiring') }}</th>
                                        </tr>
                                        </thead>

                                        @forelse(\App\Models\Teacher::latest()->take(10)->get() as $teacher)
                                            <tbody>
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$teacher->name}}</td>
                                                <td>{{$teacher->genders->name}}</td>
                                                <td>{{$teacher->joining_date}}</td>
                                                <td>{{$teacher->specializations->name}}</td>
                                                <td class="text-success">{{$teacher->created_at}}</td>
                                                @empty
                                                    <td class="alert-danger" colspan="8">{{ trans('main_trans.no_data') }}</td>
                                            </tr>
                                            </tbody>
                                        @endforelse
                                    </table>
                                </div>
                            </div>

                            {{--parents Table--}}
                            <div class="tab-pane fade" id="parents" role="tabpanel" aria-labelledby="parents-tab">
                                <div class="table-responsive mt-15">
                                    <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                        <thead>
                                        <tr  class="table-info text-danger">
                                            <th>#</th>
                                            <th>{{ trans('main_trans.name') }}</th>
                                            <th>{{ trans('main_trans.email') }}</th>
                                            <th>{{ trans('main_trans.ID_Number') }}</th>
                                            <th>{{ trans('main_trans.phone_number') }}</th>
                                            <th>{{ trans('main_trans.Added_date') }}</th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        @forelse(\App\Models\MyParent::latest()->take(10)->get() as $parent)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$parent->name_father}}</td>
                                                <td>{{$parent->email}}</td>
                                                <td>{{$parent->national_id_father}}</td>
                                                <td>{{$parent->phone_father}}</td>
                                                <td class="text-success">{{$parent->created_at}}</td>
                                                @empty
                                                    <td class="alert-danger" colspan="8">{{ trans('main_trans.no_data') }}</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                            {{--sections Table--}}
                            <div class="tab-pane fade" id="fee_invoices" role="tabpanel" aria-labelledby="fee_invoices-tab">
                                <div class="table-responsive mt-15">
                                    <table style="text-align: center" class="table center-aligned-table table-hover mb-0">
                                        <thead>
                                        <tr  class="table-info text-danger">
                                            <th>#</th>
                                            <th>{{ trans('main_trans.Invoice_date') }}</th>
                                            <th>{{ trans('main_trans.students_name') }}</th>
                                            <th>{{ trans('main_trans.Educational_level') }}</th>
                                            <th>{{ trans('main_trans.Classroom') }}</th>
                                            <th>{{ trans('main_trans.Section') }}</th>  
                                            
                                            <th>{{ trans('main_trans.Fee_type') }}</th>   
                                            <th>{{ trans('main_trans.the_amount') }}</th>                                                 
                                            <th>{{ trans('main_trans.Added_date') }}</th>
                                            
                                        </thead>
                                        <tbody>
                                        @forelse(\App\Models\Fee_invoice::latest()->take(10)->get() as $fee)
                                            <tr>
                                                <td>{{$loop->iteration}}</td>
                                                <td>{{$fee->invoice_date}}</td>
                                                <td>{{$fee->student->name}}</td>
                                                <td>{{$fee->grade->name}}</td>
                                                <td>{{$fee->classroom->name_class}}</td>
                                                <td>{{$fee->student->Sections->name_section}}</td>
                                              
                                                <td>{{$fee->fees->title}}</td>     
                                                <td>{{$fee->amount}}</td>                 
                                                <td class="text-success">{{$fee->created_at}}</td>
                                            </tr>
                                        @empty
                                            <tr>
                                                <td class="alert-danger" colspan="9">{{ trans('main_trans.no_data') }}</td>
                                            </tr>
                                        @endforelse
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>

    <livewire:calendar />

    <!--=================================
wrapper -->

    <!--=================================
footer -->

    @include('layouts.footer')
</div><!-- main content wrapper end-->
</div>
</div>
</div>

<!--=================================
footer -->

@include('layouts.footer-scripts')
@livewireScripts
@stack('scripts')
@jquery
    @toastr_js
    @toastr_render
</body>

</html>