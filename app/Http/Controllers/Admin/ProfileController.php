<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    
    public function viewProfile()
    {
        $admin = Admin::find(1);
        return view('backend.admin.admin_profile', compact('admin'));
    }

    public function editProfile()
    {
        $admin = Admin::find(1);
        return view('backend.admin.admin_edit_profile', compact('admin'));
    }

    public function updateProfile(Request $request,)
    {
        $rules = [
            'email' => 'required',
            'name' => 'required',
            'phone' => 'required',
        ];
        $this->validate($request, $rules);
        $admin = Admin::find(1);
        $admin->email = $request->email;
        $admin->name = $request->name;
        if ($request->gender == Admin::$DO_NOT_SPECIFY) {
            $admin->gender = null;
        } else {
            $admin->gender = $request->gender;
        }

        $admin->phone = $request->phone;
        $admin->alt_phone = $request->alt_phone;

        $old_photo = $request->old_photo;

        if ($request->file('profile_photo_path')) {
            @unlink(public_path('backend/assets/img/admin/' . $old_photo));
            $file = $request->file('profile_photo_path');
            $fileName = date('YmdHi') . '.' . $file->getClientOriginalExtension();
            $upload_location = public_path('backend/assets/img/admin');
            $file->move($upload_location, $fileName);
            $admin->profile_photo_path = $fileName;
        }
        $admin->save();
        return redirect()->route('admin.profile');
    }

    public function changePassword()
    {
        $admin = Admin::find(1);
        return view('backend.admin.admin_change_password', compact('admin'));
    }

    public function adminUpdatePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|confirmed',
            'password_confirmation' => 'required'
        ]);
        $adminData = Admin::find(1);
        $hash_password = $adminData->password;
        if (Hash::check($request->current_password, $hash_password)) {
            $adminData->password = Hash::make($request->password);
            $adminData->save();
            Auth::logout();
            return redirect()->route('admin.logout');
        } else {
            return redirect()->back();
        }
    }
}
