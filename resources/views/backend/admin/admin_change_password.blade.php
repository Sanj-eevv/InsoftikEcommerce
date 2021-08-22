@extends('backend.admin_panel.admin_panel_main')
@section('admin')

<div class="container-fluid dashboard-content">
    <div class="row">
        <div class="col-xl-10">
            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="page-header" id="top">
                        <h2 class="pageheader-title">Edit Profile</h2>
                        <div class="page-breadcrumb">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Dashboard</a></li>
                                    <li class="breadcrumb-item"><a href="#" class="breadcrumb-link">Forms</a></li>
                                    <li class="breadcrumb-item active" aria-current="page">Form Elements
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                    <div class="card">
                        <h5 class="card-header">Profile</h5>
                        <div class="card-body">
                            <form novalidate="" method="POST" action="{{ route('admin.passwordUpdate') }}" enctype="multipart/form-data">
                                @csrf
                                <div class="text-center">
                                    <img id="showImage" src="{{ (!empty($admin->profile_photo_path)) ? asset('backend/assets/img/admin/'.$admin->profile_photo_path) : asset('backend/assets/img/admin/avatar-1.jpg')  }}" alt="User Avatar" class="rounded-circle user-avatar-xxl" style="height: 100px; width: 100px;">
                                </div>
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Current Password</label>
                                    <input type="password" class="form-control" name="current_password" placeholder="Enter your current password">
                                    @error('current_password')
                                    <span class="text-info">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>New Password</label>
                                    <input name="password" type="password" placeholder="Enter your new password" class="form-control">
                                    @error('password')
                                    <span class="text-info">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Confirm Password</label>
                                    <input name="password_confirmation" type="password" placeholder="Re-enter your new password" class="form-control">
                                    @error('password_confirmation')
                                    <span class="text-info">{{ $message }}</span>
                                    @enderror
                                </div>

                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update Password</button>
                                </div>
                            </form>
                        </div>

                    </div>
                </div>
            </div>
        </div>

        <div class="col-xl-2 col-lg-2 col-md-6 col-sm-12 col-12">
            <div class="sidebar-nav-fixed">
                <ul class="list-unstyled">
                    <li><a href="#overview" class="active">Overview</a></li>
                    <li><a href="#basicform">Basic Form</a></li>
                    <li><a href="#select">Select</a></li>
                    <li><a href="#checkboxradio">Checkbox & Radio</a></li>
                    <li><a href="#validation">Validation state</a></li>
                    <li><a href="#inputgroup">Input Groups</a></li>
                    <li><a href="#inputmask">Inputmask</a></li>
                    <li><a href="#switchcontent">Switch Content</a></li>
                    <li><a href="#top">Back to Top</a></li>
                </ul>
            </div>
        </div>
        <!-- ============================================================== -->
        <!-- end sidenavbar -->
        <!-- ============================================================== -->
    </div>
</div>
@endsection