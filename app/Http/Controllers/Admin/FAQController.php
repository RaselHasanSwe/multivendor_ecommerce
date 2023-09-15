<?php

namespace App\Http\Controllers\Admin;


use App\Models\Faq;
use Illuminate\Http\Request;
use App\Http\Requests\FaqRequest;
use App\Services\Admin\FaqService;
use App\Http\Controllers\Controller;

class FAQController extends Controller
{
    public function createFaq()
    {
        return view('admin.faqs.create');
    }

    public function saveFaq( FaqRequest $request)
    {
        Faq::create($request->all());
        return redirect()->back()->with('success', 'Saved!');
    }

    public function index(FaqService $faq, Request $request )
    {
        if($request->ajax())
        return $faq->faqs( $request );
        return view('admin.faqs.index');
    }

    public function delete( Request $request )
    {
        Faq::find($request->id)->delete();
        return response()->json(['success' => 'success']);
    }

    public function edit( Request $request )
    {
        $data['faq']  = Faq::findOrFail( $request->id );
        return view('admin.faqs.edit-modal', $data);
    }

    public function update( Request $request){
        Faq::findOrFail($request->id)->update($request->all());
        return response()->json(['success' => 'success']);
    }
}
