
@extends('backend.layouts.master')

@section('title')
Passports - Admin Panel
@endsection

@section('styles')
    <!-- Start datatable css -->
@endsection


@section('admin-content')

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">الجوازات</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">لوحة التحكم</a></li>
                    <li><span>جميع الجوازات</span></li>
                </ul>
            </div>
        </div>
        <div class="col-sm-6 clearfix">
            @include('backend.layouts.partials.logout')
        </div>
    </div>
</div>
<!-- page title area end -->

<div class="main-content-inner">
    <div class="row">
        <!-- data table start -->
        <div class="col-12 mt-5">
            <div class="card">
                <div class="card-body">
                    <p class="float-right mb-2">
                            <a class="btn btn-primary text-white" href="{{ route('admin.pass.create') }}">اضافة جواز جديد</a>

                    </p>
                    <div class="clearfix"></div>

                    <div class="col-12 mt-2">
                        <div class="card">
                            <div class="card-body">
                                <h4 class="header-title float-right">قائمة الجوازات</h4>
                                <div class="single-table">
                                    <div class="table-responsive">
                                        <table dir="rtl" class="table table-hover progress-table text-center">
                                            <thead class="text-uppercase">
                                                <tr>
                                                    <th scope="col">رقم الجواز</th>
                                                    <th scope="col">اسم حامل الجواز</th>
                                                    <th scope="col">اسم مكتب التخليص</th>
                                                    <th scope="col">حالة الجواز</th>
                                                    <th scope="col">عملبات</th>
                                                </tr>
                                            </thead>
                                            <tbody>


                               @foreach ($passes as $pass)

                               <tr>
                                <td>{{ $pass->pass_num }}</td>
                                <td>{{$pass->name }}</td>
                                <td>{{ $pass->office_name }}
                                    {{-- <div class="progress" style="height: 8px;">
                                        <div class="progress-bar bg-warning" role="progressbar" style="width: 80%;" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                    </div>
                                     --}}
                                </td>
                                <td>
                                    @if($pass->state)
                                    <span class="status-p bg-success">جاهز</span>
                              @else
                              <span class="status-p bg-warning">غير جاهز</span>

                                    @endif
                                </td>
                                <td>
                                    <ul class="d-flex justify-content-center">
                                        <li class="ml-3"><a href="{{ route('admin.pass.edit',$pass->id) }}" class="text-secondary"><i class="fa fa-edit"></i></a></li>
                                        <li><a href="#" class="text-danger"><i class="ti-trash"></i></a></li>
                                    </ul>
                                </td>
                            </tr>
                               @endforeach


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
        <!-- data table end -->

    </div>
</div>
@endsection


@section('scripts')
     <!-- Start datatable js -->

     <script>
         /*================================
        datatable active
        ==================================*/

     </script>
@endsection
