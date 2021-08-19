@extends('admin.admin_main')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<div class="content">
    <div class="row">
        <div class="col-lg-12">
            <div class="card card-default">
                <div class="card-header card-header-border-bottom">
                    <h2>Edit Profile</h2>
                </div>
                <div class="card-body">
                    <form novalidate="" method="POST" action="{{ route('admin.profileUpdate')}}" enctype="multipart/form-data">
                        @csrf
                        <div class="card text-center widget-profile px-0 border-0">
                            <div class="card-img mx-auto rounded-circle">
                                <img id="showImage" src="{{ (!empty($admin->profile_photo_path)) ? asset('backend/assets/img/admin/'.$admin->profile_photo_path) : asset('backend/assets/img/admin/download.png')}}" style="height: 100px; width: 100px;">
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="admin image">Upload image</label>
                            <input type="file" id="image" class="form-control-file" name="profile_photo_path">
                        </div>
                        <div class="form-group">
                            <label for=" admin name">Name</label>
                            <input type="email" class="form-control" name="name" value="{{ $admin->name }}">
                        </div>
                        <div class="form-group">
                            <label for="admin email address">Email address</label>
                            <input type="email" class="form-control" name="email" value="{{ $admin->email }}">
                        </div>
                        <input type="hidden" name="old_photo" class="form-control" value="{{ $admin -> profile_photo_path }}">
                        <div class="form-footer pt-4 pt-5 mt-4 border-top">
                            <button type="submit" class="btn btn-primary btn-default">Update</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <script type="text/javascript">
        $(document).ready(function() {
            $('#image').change(function(e) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#showImage').attr('src', e.target.result);
                }
                reader.readAsDataURL(e.target.files['0']);
            });
        });
    </script>
    @endsection