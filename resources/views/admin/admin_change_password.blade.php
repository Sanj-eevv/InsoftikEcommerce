@extends('admin.admin_main')
@section('admin')
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Update Password</h2>
                </div>
                <div class="card-body">
                    <form novalidate="" method="POST" action="{{ route('admin.adminUpdatePassword') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="card text-center widget-profile px-0 border-0">
                            <div class="card-img mx-auto rounded-circle">
                                <img id="showImage" src="{{ (!empty($admin->profile_photo_path)) ? asset('backend/assets/img/admin/'.$admin->profile_photo_path) : asset('backend/assets/img/admin/download.png') }}" style="height: 100px; width: 100px;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for=" admin password">Current Password</label>
                            <input type="password" class="form-control" name="current_password" value="">
                        </div>
                        <div class="form-group">
                            <label for=" admin new password">New Password</label>
                            <input type="password" class="form-control" name="password" value="">
                        </div>
                        <div class="form-group">
                            <label for="admin new password confirm">Confirm Password</label>
                            <input type="password" class="form-control" name="password_confirmation" value="">
                        </div>

                        <div class="form-footer pt-4 pt-5 mt-4 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Update Password</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    @endsection