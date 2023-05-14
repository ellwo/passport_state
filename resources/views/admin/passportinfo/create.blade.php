
@extends('backend.layouts.master')

@section('title')
Passport Create - Admin Panel
@endsection

@section('styles')
<style>
    .form-check-label {
        text-transform: capitalize;
    }
</style>
@endsection


@section('admin-content')

<!-- page title area start -->
<div class="page-title-area">
    <div class="row align-items-center">
        <div class="col-sm-6">
            <div class="breadcrumbs-area clearfix">
                <h4 class="page-title pull-left">اضافة بيانات جواز جديد</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">لوحة التحكم </a></li>
                    <li><a href="{{ route('admin.pass') }}">جميع الجوازات</a></li>
                    <li><span>اضافة جواز</span></li>
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
                    <h4 class="header-title text-right">اضافة معلومات الجواز</h4>
                    @include('backend.layouts.partials.messages')

                    <form class="text-right align-right" dir="rtl" action="{{ route('admin.pass.store') }}" method="POST">
                        @csrf
                        <div class="form-group text-right column">
                            <label for="pass_num">رقم الجواز</label>
                            <input type="text" class="form-control text-uppercase col-10 col-lg-8" id="pass_num"
                            name="pass_num"
                            placeholder="ادخل رقم الجواز">
                        </div>


                        <div class="form-group  column">
                            <label for="name">الاسم الرباعي لحامل الجواز</label>
                            <input type="text" dir="rtl" class="form-control col-lg-8 col-10" id="name" name="name"
                            placeholder="">
                        </div>

                        <div class="form-group">
                            <label for="example-date-input" class="col-form-label">تاريخ الميلاد</label>
                            <input class="form-control col-lg-8 col-10" name="birthday" type="date" value="2018-03-05" id="example-date-input">
                        </div>


                        <div class="form-group  column">
                            <label for="office_name">اسم مكتب التخليص</label>
                            <input type="text" dir="rtl" class="form-control col-10 col-lg-8" id="office_name" name="office_name"
                            placeholder="مكتب الامجاد">
                        </div>


                        <div class="form-group  column ">
                            <label for="state_info">ملاحظات عن حالة الجواز</label>
                            <br>
                            <input dir="rtl" type="text" class="form-control col-10 col-lg-8" id="state_info" name="state_info"
                            placeholder="لايزال في السفارة">
                        </div>

                        <div dir="ltr">
                            <b class="text-dark mb-3 mt-4 d-block">حالة الجواز</b>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" checked id="customRadio4" name="state" value="1" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio4">جاهز</label>
                            </div>
                            <div class="custom-control custom-radio custom-control-inline">
                                <input type="radio" id="customRadio5" name="state" value="0" class="custom-control-input">
                                <label class="custom-control-label" for="customRadio5">غير جاهز</label>
                            </div>
                        </div>



                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">حفظ</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- data table end -->

    </div>
</div>
@endsection

@section('scripts')
     @include('backend.pages.roles.partials.scripts')
@endsection
