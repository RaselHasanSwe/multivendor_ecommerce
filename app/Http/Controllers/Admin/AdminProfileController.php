<?php

namespace App\Http\Controllers\Admin;

use Exception;
use App\Models\Admin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;
use App\Services\Admin\FileUploadService;
use App\Http\Requests\Admin\ProfileRequest;
use App\Models\Country;
use App\Models\State;

class AdminProfileController extends Controller
{
    public function profile()
    {
        $data['profile'] = Admin::find(Auth::user()->id);
        return view('admin.profile.profile', $data);
    }

    public function updateProfile(FileUploadService $upload, ProfileRequest $request )
    {
        $admin = Admin::find(Auth()->user()->id);
        $admin->name = $request->name;
        $admin->email = $request->email;
        if($request->hasFile('file'))
            $admin->image  = $upload->upload($request->file('file'), $upload::PROFILE_FILE_PATH);
        $admin->save();
        return redirect()->back()->with('success','Saved!');
    }
    public function changePasswordPage()
    {
        return view('admin.profile.change-password');
    }

    public function changePassword( Request $request )
    {
        if($request->password != $request->password_confirmation)
            return redirect()->back()->with('error','Password not match with confirm password');
        if(strlen($request->password) < 8 )
            return redirect()->back()->with('error','Password should be at least 8 charecter');

        $admin = Admin::find(Auth::user()->id);
        $admin->password = Hash::make($request->password);
        $admin->save();
        return redirect()->back()->with('success','Saved!');
    }

    public function vendor_profile()
    {
        $data['profile']   = Admin::find(auth()->user()->id);
        $data['countries'] = Country::all();
        $data['states']    = State::all();
        return view('admin.vendor.profile',$data);
    }

    public function vendor_profile_update(FileUploadService $upload, ProfileRequest $request)
    {
        $profile = Admin::find(auth()->user()->id);
        if($request->hasFile('file')){
            if($profile->image)
                dd($upload->removeImg($profile->image, $upload::PROFILE_FILE_PATH) );
            $profile->image  = $upload->upload($request->file('file'), $upload::PROFILE_FILE_PATH);
        }
        $profile->update($request->all());
        return redirect()->back()->with('Profile updated','Success!');
    }
}
