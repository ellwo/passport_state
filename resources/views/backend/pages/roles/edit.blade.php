
@extends('backend.layouts.master')

@section('title')
Role Edit - Admin Panel
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
                <h4 class="page-title pull-left">Role Edit - {{ $role->name }}</h4>
                <ul class="breadcrumbs pull-left">
                    <li><a href="{{ route('admin.dashboard') }}">Dashboard</a></li>
                    <li><a href="{{ route('admin.roles.index') }}">All Roles</a></li>
                    <li><span>Edit Role</span></li>
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
                    <h4 class="header-title">Edit Role</h4>
                    @include('backend.layouts.partials.messages')

                    <form action="{{ route('admin.roles.update', $role->id) }}" method="POST">
                        @method('PUT')
                        @csrf
                        <div class="form-group">
                            <label for="name">Role Name</label>
                            <input type="text" class="form-control" id="name" value="{{ $role->name }}" name="name" placeholder="Enter a Role Name">
                        </div>

                        <div class="form-group">
                            <label for="name">Permissions</label>

                            <div class="form-check">
                                <input type="checkbox" class="form-check-input" id="checkPermissionAll" value="1"  checked>
                                <label class="form-check-label" for="checkPermissionAll">All</label>
                            </div>
                            <hr>
                            @php $i = 1; @endphp
                            <select name="permission[]" id="permission" class="form-control select2" multiple="multiple" required>
                                @foreach($all_permissions as $id => $permissions)
                                    <option value="{{ $id }}" {{ (in_array($id, old('permissions', [])) || isset($role) && $role->permissions()->pluck('name', 'id')->contains($id)) ? 'selected' : '' }}>{{ $permissions->name }}</option>
                                @endforeach
                            </select>
                        </div>
                        <button type="submit" class="btn btn-primary mt-4 pr-4 pl-4">Update Role</button>
                    </form>
                </div>
            </div>
        </div>
        <!-- data table end -->

    </div>
</div>
@endsection


@section('scripts')
<script>

  $('.select-all').click(function () {
    let $select2 = $(this).parent().siblings('.select2')
    $select2.find('option').prop('selected', 'selected')
    $select2.trigger('change')
  })
  $('.deselect-all').click(function () {
    let $select2 = $(this).parent().siblings('.select2')
    $select2.find('option').prop('selected', '')
    $select2.trigger('change')
  })

  $('.select2').select2()

</script>
     @include('backend.pages.roles.partials.scripts')
@endsection
