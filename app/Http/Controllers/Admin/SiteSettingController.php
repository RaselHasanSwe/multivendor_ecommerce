<?php

namespace App\Http\Controllers\Admin;

use App\Models\SiteSetting;
use App\Services\Admin\FileUploadService;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SiteSettingController extends Controller
{
    private $uploadService;

    public function __construct( FileUploadService $uploadService )
    {
        $this->uploadService = $uploadService;
    }
    public function index()
    {
        $data['setting'] = SiteSetting::Where('admin_id', auth()->user()->id)->first();
        return view('admin.site_setting.index', $data);
    }
    public function faviconSetting( $request )
    {
        $favicon = ($request->hasFile('file')) ? $this->uploadService->upload($request->file('file'), $this->uploadService::FAVICON_SETTING) : '';
        if(empty($favicon)) return redirect()->back();
        $setting = SiteSetting::Where('admin_id', auth()->user()->id)->first();
        if($setting) $this->uploadService->removeImg($setting->favicon, $this->uploadService::SITE_SETTING);
        $request->request->add(['favicon' => $favicon, 'admin_id'=>auth()->user()->id]);
        ($setting) ? $setting->update($request->all()) : SiteSetting::create($request->all());
    }


    public function logoSetting( $request )
    {
        $logo = ($request->hasFile('file')) ? $this->uploadService->upload($request->file('file'), $this->uploadService::SITE_SETTING) : '';
        if(empty($logo)) return redirect()->back();
        $setting = SiteSetting::Where('admin_id', auth()->user()->id)->first();
        if($setting) $this->uploadService->removeImg($setting->logo, $this->uploadService::SITE_SETTING);
        $request->request->add(['logo' => $logo, 'admin_id'=>auth()->user()->id]);
        ($setting) ? $setting->update($request->all()) : SiteSetting::create($request->all());
    }

    public function bannerSetting( $request )
    {
        $banner = ($request->hasFile('banner_image')) ? $this->uploadService->upload($request->file('banner_image'), $this->uploadService::SITE_SETTING) : '';
        if(empty($banner)) return redirect()->back();
        $setting = SiteSetting::Where('admin_id', auth()->user()->id)->first();
        if($setting) $this->uploadService->removeImg($setting->banner, $this->uploadService::SITE_SETTING);
        $request->request->add(['banner' => $banner, 'admin_id'=>auth()->user()->id]);
        ($setting) ? $setting->update($request->all()) : SiteSetting::create($request->all());
    }

    public function faviconSaveSetting( Request $request, $status = 'favicon' )
    {
        ($status == 'favicon') ? $this->faviconSetting( $request ) : '';
        return redirect()->back()->with('success','Saved!');
    }

    public function saveSetting( Request $request, $status = 'logo' )
    {
        ($status == 'logo') ? $this->logoSetting( $request ) : $this->bannerSetting( $request );
        return redirect()->back()->with('success','Saved!');
    }

    public function socialSetting( $request ){
        $setting = SiteSetting::Where('admin_id', auth()->user()->id)->first();
        ($setting) ? $setting->update($request->all()) : SiteSetting::create($request->all());
    }

    public function locatiionSetting( $request ) {
        $setting = SiteSetting::Where('admin_id', auth()->user()->id)->first();
        ($setting) ? $setting->update($request->all()) : SiteSetting::create($request->all());
    }

    public function saveSettingSocialLocation(Request $request, $status = ''){
        ($status == 'socialsettings') ? $this->socialSetting( $request ) : $this->locatiionSetting( $request );
        return redirect()->back()->with('success', 'Saved!');
    }

}
