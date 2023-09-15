<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Artisan;
use App\Http\Controllers\Admin\FAQController;

use App\Http\Controllers\Admin\SizeController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Admin\ColorController;
use App\Http\Controllers\ProductTestController;
use App\Http\Controllers\Admin\AboutUController;
use App\Http\Controllers\Admin\CouponController;
use App\Http\Controllers\Admin\SliderController;
use App\Http\Controllers\Admin\ContactController;
use App\Http\Controllers\Admin\VendorsCtonroller;
use App\Http\Controllers\Admin\CategoryController;
use App\Http\Controllers\Admin\CustomerController;
use App\Http\Controllers\Admin\ShippingController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\MyAccountController;
use App\Http\Controllers\Admin\TermOfUseController;
use App\Http\Controllers\Admin\ContactInfoController;
use App\Http\Controllers\Admin\SiteSettingController;
use App\Http\Controllers\Admin\SubCategoryController;


use App\Http\Controllers\Admin\AdminProfileController;
use App\Http\Controllers\Admin\InnerCategoryController;
use App\Http\Controllers\Admin\PrivacyPolicyController;



// Frontend Controllers
use App\Http\Controllers\Admin\RefundReturnPolicyController;
use App\Http\Controllers\Frontend\ProductController as FrontProductController;
use App\Models\Contact;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

// Cache Clear
Route::get('/clear-cache', function () {
    Artisan::call('route:clear');
    Artisan::call('cache:clear');
    Artisan::call('config:cache');
    Artisan::call('config:clear');
    Artisan::call('view:clear');

    return 'Clear Cache Done!';
});


Route::get('/admin', function () {
    return redirect()->route('admin.login');
});

Route::get('/admin/login', [LoginController::class, 'showAdminLoginForm'])->name('admin.login');
Route::post('/admin/login', [LoginController::class, 'adminLogin'])->name('admin.login.attampt');
Route::post('/admin/logout', [LoginController::class, 'adminLogout'])->name('admin.logout');

Route::prefix('admin')->middleware(['auth:admin'])->name('admin.')->group(function () {

    Route::controller(CategoryController::class)->name('category.')->group(function () {
        Route::get('/category', 'index')->name('index');
        Route::get('/category/create', 'create')->name('create');
        Route::post('/category/create', 'store')->name('store');
        Route::post('/category/edit', 'edit')->name('edit');
        Route::post('/category/update', 'update')->name('update');
        Route::post('/category/delete', 'delete')->name('delete');
    });

    Route::controller(SubCategoryController::class)->name('subcategory.')->group(function () {
        Route::get('/sub-category', 'index')->name('index');
        Route::get('/sub-category/create', 'create')->name('create');
        Route::post('/sub-category/create', 'store')->name('store');
        Route::post('/sub-category/edit', 'edit')->name('edit');
        Route::post('/sub-category/update', 'update')->name('update');
        Route::post('/sub-category/delete', 'destroy')->name('delete');
        Route::post('/sub-category-by-id', 'subCategoryById')->name('byId');
    });

    Route::controller(InnerCategoryController::class)->name('inner.category.')->group(function () {
        Route::get('/inner-category', 'index')->name('index');
        Route::get('/inner-category/create', 'create')->name('create');
        Route::post('/inner-category/create', 'store')->name('store');
        Route::post('/inner-category/edit', 'edit')->name('edit');
        Route::post('/inner-category/update', 'update')->name('update');
        Route::post('/inner-category/delete', 'delete')->name('delete');
    });

    Route::controller(ContactController::class)->group(function () {
        Route::get('/contact', 'index')->name('contact.index');
        Route::post('/contact/view', 'viewContact')->name('contact.view');
        Route::post('/contact/delete', 'deleteContact')->name('contact.delete');
    });


    Route::controller(AdminProfileController::class)->group(function () {
        Route::get('/profile','profile')->name('profile');
        Route::post('/profile/update','updateProfile')->name('profile.update');
        Route::get('/profile/change-password','changePasswordPage')->name('changePasswordPage');
        Route::post('/profile/change-password','changePassword')->name('changePassword');

        Route::get('/vendor-profile','vendor_profile')->name('vendor.profile');
        Route::post('/vendor-profile','vendor_profile_update')->name('vendor.profile.update');

        Route::get('/profile', 'profile')->name('profile');
        Route::post('/profile/update', 'updateProfile')->name('profile.update');
        Route::get('/profile/change-password', 'changePasswordPage')->name('changePasswordPage');
        Route::post('/profile/change-password', 'changePassword')->name('changePassword');

        Route::get('/vendor-profile', 'vendor_profile')->name('vendor.profile');
        Route::post('/vendor-profile', 'vendor_profile_update')->name('vendor.profile.update');

    });

    Route::controller(SiteSettingController::class)->group(function () {
        Route::get('/site-setting', 'index')->name('site-setting');
        Route::post('/favicon-setting/{status?}', 'faviconSaveSetting')->name('favicon-setting.save');
        Route::post('/site-setting/{status?}', 'saveSetting')->name('site-setting.save');
        Route::post('/site-settings/{status?}', 'saveSettingSocialLocation')->name('site-settings.save');
    });

    Route::controller(ColorController::class)->group(function () {
        Route::get('/color', 'index')->name('color.index');
        Route::get('/color/create', 'createColor')->name('color.create');
        Route::post('/color/create', 'saveColor')->name('color.save');
        Route::post('/color/delete', 'delete')->name('color.delete');
        Route::post('/color/edit', 'edit')->name('color.edit');
        Route::post('/color/update', 'update')->name('color.update');
    });

    Route::controller(SizeController::class)->group(function () {
        Route::get('/size', 'size')->name('size');
        Route::get('/size/create', 'createSize')->name('size.create');
        Route::post('/size/create', 'saveSize')->name('size.save');
        Route::post('/size/edit/', 'editSize')->name('size.edit');
        Route::post('/size/update/', 'updateSize')->name('size.update');
        Route::post('/size/delete', 'deleteSize')->name('size.delete');
    });

    Route::controller(AboutUController::class)->group(function () {
        Route::get('/about-us', 'index')->name('about-us');
        Route::post('/about-us-save', 'savePages')->name('about-us.save');
    });


    Route::controller(ContactInfoController::class)->group(function () {
        Route::get('/contact-info', 'index')->name('contact-info');
        Route::post('/contact-info-save', 'savePages')->name('contact-info.save');
    });

    Route::controller(PrivacyPolicyController::class)->group(function () {
        Route::get('/privacy-policy', 'index')->name('privacy-policy');
        Route::post('/privacy-policy-save', 'savePages')->name('privacy-policy.save');
    });

    Route::controller(TermOfUseController::class)->group(function () {
        Route::get('/use-of-term', 'index')->name('use-of-term');
        Route::post('/use-of-term-save', 'savePages')->name('use-of-term.save');
    });

    Route::controller(RefundReturnPolicyController::class)->group(function () {
        Route::get('/refund-policy', 'index')->name('refund-policy');
        Route::post('/refund-policy-save', 'savePages')->name('refund-policy.save');
    });


    Route::controller(FAQController::class)->group(function () {
        Route::get('/faqs', 'index')->name('faqs.index');
        Route::get('/faqs/create', 'createFaq')->name('faqs.create');
        Route::post('/faqs/save', 'saveFaq')->name('faqs.save');
        Route::post('/faqs/delete', 'delete')->name('faqs.delete');
        Route::post('/faqs/edit', 'edit')->name('faqs.edit');
        Route::post('/faqs/update', 'update')->name('faqs.update');
    });

    Route::controller(VendorsCtonroller::class)->group(function () {
        Route::get('/active-vendors', 'activeVendors')->name('vendors');
        Route::get('/deactive-vendors', 'deactiveVendors')->name('deactive_vendors');

        Route::post('/vendors/status', 'vendorStatus')->name('vendors_status');

        Route::get('/view-active-vendor', 'deactiveStatus')->name('view-active-vendor');
        Route::get('/view-deactive-vendor', 'deactiveStatus')->name('view-deactive-vendor');
    });


    Route::controller(ShippingController::class)->group(function () {
        Route::get('/shipping', 'index')->name('shipping.index');
        Route::post('/shipping/save/{shippingStatus}', 'saveShipping')->name('shipping.save');
    });

    Route::controller(CustomerController::class)->group(function () {
        Route::get('/customers', 'customers')->name('customers');
    });



    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    //farhinaafrin
    Route::controller(CouponController::class)->group(function () {
        Route::get('/coupon', 'index')->name('coupon.index');
        Route::get('/coupon/create', 'createCoupon')->name('coupon.create');
        Route::post('/coupon/create', 'saveCoupon')->name('coupon.save');
        Route::post('/coupon/delete', 'delete')->name('coupon.delete');
        Route::post('/coupon/edit', 'edit')->name('coupon.edit');
        Route::post('/coupon/update', 'update')->name('coupon.update');
    });


    // Slider route

        Route::controller(SliderController::class)->group(function () {
            Route::get('/sliders', 'index')->name('slider.index');
            Route::get('/sliders/create', 'createSlider')->name('slider.create');
            Route::post('/sliders/create', 'saveSlider')->name('slider.save');
            Route::post('/sliders/delete', 'delete')->name('slider.delete');
            Route::post('/sliders/edit', 'edit')->name('slider.edit');
            Route::post('/sliders/update', 'update')->name('slider.update');
        });



});


// Route::get('/my-account', function () {
//     return view('frontend.pages.my-account');
// })->name('my-account');


// testing
// Route::get('rasel/product', [ProductTestController::class, 'product']);
Route::get('/{category}/{subCategory?}/{innerCategory?}', [FrontProductController::class, 'products'])->name('products');
