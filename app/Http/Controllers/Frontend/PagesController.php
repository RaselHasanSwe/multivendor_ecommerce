<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AboutUs;
use App\Models\Billing;
use App\Models\Contact;
use App\Models\Category;
use App\Models\ContactInfo;
use App\Models\Country;
use App\Models\Faq;
use App\Models\Order;
use App\Models\PrivacyPolicy;
use App\Models\TermOfUse;
use App\Models\RefundPolicy;
use App\Models\State;
use App\Models\Wishlist;
use Illuminate\Support\Facades\Auth;

class PagesController extends Controller
{
    public function home(){
        $data['pageData'] = Category::get();
        return view('frontend.home', $data);
    }

    public function aboutUs()
    {
        $data['pageData'] = AboutUs::first();
        return view('frontend.pages.about-us', $data);
    }

    public function contactUs()
    {
        $data['pageData'] = ContactInfo::first();
        return view('frontend.pages.contact-us', $data);
    }

    public function faq()
    {
        $data['faqData'] = FAQ::get();
        return view('frontend.pages.faq', $data);
    }

    public function privacyPolicy()
    {
        $data['pageData'] = PrivacyPolicy::first();
        return view('frontend.pages.privacy-policy', $data);
    }

    public function termsOfUse()
    {
        $data['pageData'] = TermOfUse::first();
        return view('frontend.pages.terms-of-use', $data);
    }

    public function refundPolicy()
    {
        $data['pageData'] = RefundPolicy::first();
        return view('frontend.pages.refund-policy', $data);
    }
    public function contactsUs()
    {
        $data['pageData'] = Contact::first();
        return view('frontend.pages.contact-us', $data);
    }

    public function myAccount()
    {
        $data['states']=State::all();
        $data['wishlist']=Wishlist::where('user_id',auth()->user()->id)
                                ->with('product','product.images')
                                ->paginate(15);
        $data['billings'] = Billing::where('user_id',Auth::user()->id)->first();
        $data['orders']=Order::where('user_id',Auth::user()->id)->with('orderedProducts')->get();
        // dd( $data['orders']->toArray());
        return view('frontend.pages.my-account', $data);
    }
}
