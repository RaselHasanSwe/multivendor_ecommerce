<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;
use App\Http\View\Composers\AllSizeComposer;
use App\Http\View\Composers\AllColorComposer;
use App\Http\View\Composers\CategoryComposer;
use App\Http\View\Composers\AllCategoryComposer;

class AppServiceProvider extends ServiceProvider
{

    public function register(){}

    public function boot(){
        Paginator::useBootstrap();
        View::composer(['*'], CategoryComposer::class);
        View::composer(['frontend.products.fillter'], AllSizeComposer::class);
        View::composer(['frontend.products.fillter'], AllColorComposer::class);
    }
}
