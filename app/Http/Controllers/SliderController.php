<?php

namespace App\Http\Controllers;

use App\Slide;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function addslider()
    {
        return view('admin.slider.slider-add-form');
    }

    public function uploadSlide(Request $request)
    {
        $this->validate($request, [
            'slide_image'  => 'required',
            'slide_title'  => 'required',
            'slide_description'  => 'required',
            'status'  => 'required',
        ]);

        $data  = new Slide();
        $data->slide_image  = $this->createSlide($request);
        $data->slide_title  = $request->slide_title;
        $data->slide_description  = $request->slide_description;
        $data->status  = $request->status;

        $data->save();

        return back()->with('message','New Slide Added Successfully');
    }

    public  function  createSlide($request)
    {
        $file = $request->file('slide_image');
        $imageName = $file->getClientOriginalName();
        $directory = 'admin/assets/slider/';
        $imageUrl = $directory.$imageName;
        //$file->move($directory,$imageUrl);

        Image::make($file)->resize(1400,570)->save( $imageUrl);

        return $imageUrl;
    }

    public  function  manageSlider()
    {
        $slides = Slide::all();
        return view('admin.slider.manage-slide',compact('slides'));
    }

    public function slideUnpublished($id)
    {
        $slide = Slide::findOrFail($id);
        $slide->status = 2;
        $slide->save();

        return redirect('/manage-slider')->with('error_message','Unpublished successfully');
    }

    public function slidePublished($id)
    {
        $slide = Slide::findOrFail($id);
        $slide->status = 1;
        $slide->save();

        return redirect('/manage-slider')->with('message','Published successfully');
    }

    public function photoGallery()
    {
        $slides = Slide::all();
        return view('admin.slider.photo-gallery',compact('slides'));
    }

    public function slideEdit($id)
    {
        $slide = Slide::findOrFail($id);
        return view('admin.slider.slider-edit-form' ,compact('slide'));
    }

    public function  updateSlide (Request $request)
    {
        $slide = Slide::findOrFail($request->slide_id);
        $slide->slide_title        = $request->slide_title;
        $slide->slide_description  = $request->slide_description;
        $slide->status              = $request->status;
        if ( $request->file('slide_image')){
            unlink($slide->slide_image);
            $slide->slide_image  = $this->createSlide($request);
        }

        $slide->save();
        return redirect('/manage-slider')->with('message','Operation successfully updated');
    }

    public function slideDelete($id)
    {
        $slide = Slide::findOrFail($id);
        unlink($slide->slide_image);
        $slide->delete();
        return redirect('/manage-slider')->with('message','Slide Deleted Successfully');

    }
}
