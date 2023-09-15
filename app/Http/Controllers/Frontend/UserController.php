<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function updateUser(Request $request)
    {
        $request->validate([
            'country_id' => 'required',
            'state_id' => 'nullable',
            'address' => 'nullable',
            'city' => 'nullable',
            'zip_code' => 'nullable',
            'address' => 'nullable',
        ]);

        $user = User::find(auth()->id());
        $user->country_id = $request->country_id;
        $user->state_id = $request->state_id;
        $user->city = $request->city;
        $user->zip_code = $request->zip_code;
        $user->address = $request->address;
        $user->save();
        return back()->with('success', 'Account updated successfully');
    }
    public function changePassword(Request $request)
    {
        $request->validate([
            'current_password' => 'required',
            'password' => 'required|min:6',
            'password_confirmation' => 'required',
        ]);
        $request->validate([
            'password' => 'confirmed',
        ]);
        // check password Matched or not
        $value = $request->current_password;
        $hashedValue = auth()->user()->password;

        if (!Hash::check($value, $hashedValue))
            return back()->withErrors(['current_password' => "Your Current password is wrong!"]);

        User::find(auth()->id())->update(
            ['password' => bcrypt($request->password)]
        );
        return  back()->with('success', 'password changed successfully');
    }

    function test(Request $request)
    {
        return $request;
    }
}
