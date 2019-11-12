<?php

namespace App\Http\Controllers;

use App\HeaderFooter;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomePageController extends Controller
{
    public function addHeaderFooterForm()
    {
        $headerFooter = DB::table('header_footers')->first();
        if (isset($headerFooter)){
            return view('admin.home.manage-header-footer-form',compact('headerFooter'));
        }else{
            return view('admin.home.add-header-footer-form');
        }
        //return view('admin.home.add-header-footer-form');
    }

    public  function  headerAndFooterSave(Request $request)
    {
        $this->headerFooterValidation($request);

        $data = new HeaderFooter();
        $data ->owner_name           = $request->owner_name;
        $data ->owner_department     = $request->owner_name;
        $data ->mobile               = $request->mobile;
        $data ->address              = $request->address;
        $data ->copyright            = $request->copyright;
        $data ->status = $request->status;
        $data ->save();

        return redirect('/home')->with('message','Header and Footer Added sucessfuuly');

       // return $request->all();
    }

    public function managerHeaderFooter($id)
    {
        $headerFooter = HeaderFooter::find($id);

        return view('admin.home.manage-header-footer-form',compact('headerFooter'));

    }

    public  function  headerAndFooterUpdate(Request $request)
    {
        $this->headerFooterValidation($request);
        $headerFooter = HeaderFooter::find($request->id);

        $headerFooter ->owner_name           = $request->owner_name;
        $headerFooter ->owner_department     = $request->owner_name;
        $headerFooter ->mobile               = $request->mobile;
        $headerFooter ->address              = $request->address;
        $headerFooter ->copyright            = $request->copyright;

        $headerFooter ->save();

        return redirect('/home')->with('message','Header and Footer Update sucessfuuly');




    }

    protected  function  headerFooterValidation($request)
    {
        $this->validate($request,[
            'owner_name'        => 'required',
            'owner_department'  => 'required',
            'mobile'            => 'required',
            'address'            => 'required',
            'copyright'         => 'required',

        ]);
    }

}
