@extends('admin.admin_main')
@section('admin')
    <div class="content">
        <div class="bg-white border rounded">
                <div class="col-lg-12 col-xl-12">
                    <div class="profile-content-left pt-5 pb-3 px-3 px-xl-5">
                        <div class="card text-center widget-profile px-0 border-0">
                            <div class="card-img mx-auto rounded-circle">
                                <img src="{{ (!empty($admin->profile_photo_path)) ? asset('backend/assets/img/admin/'.$admin->profile_photo_path) : asset('backend/assets/img/admin/download.png')  }}" alt="user image">
                            </div>
                            <div class="card-body">
                                <h4 class="py-2 text-dark">{{ $admin->name }}</h4>
                                <p>{{ $admin->email }}</p>
                                <a class="btn btn-primary btn-pill btn-lg my-4" href="{{ route('admin.profileEdit') }}">Edit Profile</a>
                            </div>
                        </div>
                        <div class="d-flex justify-content-between ">
                            <div class="text-center pb-4">
                                <h6 class="text-dark pb-2">1503</h6>
                                <p>Friends</p>
                            </div>
                            <div class="text-center pb-4">
                                <h6 class="text-dark pb-2">2905</h6>
                                <p>Followers</p>
                            </div>
                            <div class="text-center pb-4">
                                <h6 class="text-dark pb-2">1200</h6>
                                <p>Following</p>
                            </div>
                        </div>
                        <hr class="w-100">
                        <div class="contact-info pt-4">
                            <h5 class="text-dark mb-1">Contact Information</h5>
                            <p class="text-dark font-weight-medium pt-4 mb-2">Email address</p>
                            <p>{{ $admin->email }}</p>
                            <p class="text-dark font-weight-medium pt-4 mb-2">Phone Number</p>
                            <p>+99 9539 2641 31</p>
                            <p class="text-dark font-weight-medium pt-4 mb-2">Birthday</p>
                            <p>Nov 15, 1990</p>
                            <p class="text-dark font-weight-medium pt-4 mb-2">Social Profile</p>
                            <p class="pb-3 social-button">
                                <a href="#" class="mb-1 btn btn-outline btn-twitter rounded-circle">
                                    <i class="mdi mdi-twitter"></i>
                                </a>
                                <a href="#" class="mb-1 btn btn-outline btn-linkedin rounded-circle">
                                    <i class="mdi mdi-linkedin"></i>
                                </a>
                                <a href="#" class="mb-1 btn btn-outline btn-facebook rounded-circle">
                                    <i class="mdi mdi-facebook"></i>
                                </a>
                                <a href="#" class="mb-1 btn btn-outline btn-skype rounded-circle">
                                    <i class="mdi mdi-skype"></i>
                                </a>
                            </p>
                        </div>
                    </div>
                </div>
        </div>
    </div>
@endsection