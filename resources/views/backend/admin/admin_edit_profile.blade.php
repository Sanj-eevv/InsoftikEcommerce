@extends('backend.admin_panel.admin_panel_main')
@section('admin')
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
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
                            <form novalidate="" method="POST" action="{{ route('admin.profileUpdate')}}" enctype="multipart/form-data">
                                @csrf
                                <div class="text-center">
                                    <img id="showImage" src="{{ (!empty($admin->profile_photo_path)) ? asset('backend/assets/img/admin/'.$admin->profile_photo_path) : asset('backend/assets/img/admin/avatar-1.jpg')  }}" alt="User Avatar" class="rounded-circle user-avatar-xxl" style="height: 100px; width: 100px;">
                                </div>
                                <div class="form-group">
                                    <label for="inputText3" class="col-form-label">Name</label>
                                    <input type="text" class="form-control" name="name" value="{{ $admin->name }}">
                                    @error('name')
                                    <span class="text-info">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">Email address</label>
                                    <input name="email" type="email" value="{{ $admin->email }}" class="form-control">
                                    @error('email')
                                    <span class="text-info">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label>Phone Number</label>
                                    <input name="phone" type="text" value="{{ $admin->phone }}" class="form-control">
                                    @error('phone')
                                    <span class="text-info">{{ $message }}</span>
                                    @enderror
                                </div>
                                <div class="form-group">
                                    <label for="inputEmail">Alternate Phone Number (optional)</label>
                                    <input name="alt_phone" type="text" value="{{ $admin->alt_phone }}" class="form-control">
                                </div>

                                <div class="form-group">
                                    <label for="input-select">gender</label>
                                    <select class="form-control" id="input-select" name="gender">
                                        <option>Male</option>
                                        <option>Female</option>
                                        <option>Others</option>
                                        <option>Do not Specify</option>
                                    </select>
                                </div>

                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" id="image" name="profile_photo_path">
                                    <label class="custom-file-label" for="customFile" id="imageLabel">Upload an Image
                                </div>
                                <div class="form-group">
                                    <button type="submit" class="btn btn-primary">Update Profile</button>
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
<script type="text/javascript">
    $(document).ready(function() {
        $('#image').change(function(e) {
            var reader = new FileReader();
            var fullPath = document.getElementById('image').value;
            reader.onload = function(e) {
                $('#showImage').attr('src', e.target.result);
                var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
                var filename = fullPath.substring(startIndex);
                if (filename.indexOf('\\') === 0 || filename.indexOf('/') === 0) {
                    filename = filename.substring(1);
                }
                document.getElementById('imageLabel').innerHTML = filename;
            }
            reader.readAsDataURL(e.target.files['0']);
        });
    });
</script>
@endsection