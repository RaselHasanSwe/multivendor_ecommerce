<?php

namespace App\Http\Controllers\Frontend;

use Auth;
use App\Models\Admin;
use App\Models\State;
use App\Models\Country;
use App\Mail\SellerRegister;
use App\Models\VerifySeller;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Mail;
use App\Providers\RouteServiceProvider;
use App\Http\Requests\SellerRegistration;

class VendorController extends Controller
{

    public function sellerRegister()
    {
        $data['countries'] = Country::orderBy('id','DESC')->get();
        $data['states'] = State::orderBy('id','DESC')->get();
        return view('frontend.sellers.seller-register', $data);
    }

    public function sellerRegisterStore(SellerRegistration $request){

        $userNotVerifyOtp = Admin::where('email', $request->email)->first();

        if( isset( $userNotVerifyOtp->email ) && $userNotVerifyOtp->verified === 0 )
        $token = ( VerifySeller::where('admin_id', $userNotVerifyOtp->id)->exists() ) ? VerifySeller::where('admin_id', $userNotVerifyOtp->id)->first()->token : '';

        if ( !empty( $token ) ) $this->sendMailer( $token );

        $existEmail = Admin::where('email', $request->email)->count();
        if ( $existEmail > 0 ) return back()->with('danger', 'Your mail already exists!!');

        $data = $request->all();

        $data['password'] = bcrypt($request->password);

        $admin = Admin::create($data);

        $verifySeller = VerifySeller::create([
            'admin_id' => $admin->id,
            'token'    => rand(100000, 999999),
            'token_expires_at'    => now()->addMinutes(1),
        ]);

        $token = $verifySeller->token;
        $email = $verifySeller->seler->email;

        $this->sendMailer( $token );

        return redirect(route('seller.verify.showform', ['email' => $email]));
    }


    public function verifyShowForm( $email = null )
    {
        $data['notice'] = "We have sent a verification code to your email - {$email}";
        $data['email'] = $email;
        return view('frontend.sellers.seller-verify-email', $data);
    }


    public function sendMailer( $token)
    {
        Mail::to(env('MAIL_FROM_ADDRESS'))->send( new SellerRegister( $token ) );
    }


    public function sellerLoginForm()
    {
        return view('frontend.sellers.seller-login');
    }

    public function sellerLogin(Request $request )
    {
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {

            if ( Auth::guard('admin')->user()->verified === 0 ){
                $this->sellerLogout();
                return back()->with('danger', 'You need to confirm your account. We have sent you an activation code, please check your email!!');
            }

            return redirect()->intended(RouteServiceProvider::ADMIN_DASHBOARD);
        } else {
            session()->flash('danger', 'Your mail or password are mismatch!!');
            return back()->withInput($request->only('email', 'remember'));
        }
    }


    public function verifySeller( Request $request )
    {

        $verifySeller = VerifySeller::where('token', $request->token)->with('seler')->first();
        if (isset($verifySeller)) {
            $admin = $verifySeller->seler;
            if (!$admin->verified) {
                $verifySeller->seler->verified = 1;
                $verifySeller->seler->save();
                $status = "Your e-mail is verified. You can now login.";
            } else {
                $status = "Your e-mail is already verified. You can now login.";
            }
        } else {
            return back()->with('danger', "Sorry your email cannot be identified.");
        }
        return redirect(route('seller.login'))->with('success', $status);

    }

    public function resendOtp( $email )
    {
        $userVerifyOtp = Admin::where('email', $email)->first();
        $verifySeller = VerifySeller::where('admin_id', $userVerifyOtp->id);

        if ($verifySeller->token_expires_at->lt(now())) {
            return redirect()->route('seller.login')->with('danger','Your code has expired. Please login again.');
        }

        $token = ($verifySeller->exists()) ? VerifySeller::where('admin_id', $userVerifyOtp->id)->first()->token : '';

        if (!empty( $token )) $this->sendMailer($token);
        return back()->with("success", "We have resend the verification code to your email");

    }


    public function sellerLogout()
    {
        Auth::guard('admin')->logout();
        return redirect(RouteServiceProvider::ADMIN_LOGIN);
    }
}
