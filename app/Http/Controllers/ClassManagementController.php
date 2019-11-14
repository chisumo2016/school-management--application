<?php

namespace App\Http\Controllers;

use App\ClassName;
use App\School;
use Illuminate\Http\Request;

class ClassManagementController extends Controller
{
    public function addClassForm()
    {
        return view('admin.settings.class.add-form');
    }

    public function classSave(Request $request)
    {
        $this->validate($request, [
            'class_name' => 'required|string'
        ]);

        $data = new ClassName();
        $data->class_name = $request->class_name;
        $data->status= 1;

        $data->save();

        return back()->with('message','Class Name Added Successfully');
    }

    public function classList()
    {
        $classes = ClassName::all();
        return view('admin.settings.class.list', compact('classes'));
    }

    public function classUnpublished($id)
    {
        $class = ClassName::findOrFail($id);
        $class->status = 2;
        $class->save();

        return redirect('/class/list')->with('message','Class Unpublished Successfully');
    }

    public function classPublished($id)
    {
        $class = ClassName::findOrFail($id);
        $class->status = 1;
        $class->save();

        return redirect('/class/list')->with('message','Class Published Successfully');
    }

    public function classEdit($id)
    {
        $class = ClassName::findOrFail($id);
        return view('admin.settings.class.edit',compact('class'));
    }

    public function classUpdate(Request $request)
    {
        $this->validate($request, [
            'class_name' => 'required|string'
        ]);

        $data = ClassName::findOrFail($request->class_id);
        $data->class_name = $request->class_name;
        $data->status= 1;

        $data->save();

        return redirect('/class/list')->with('message','Class Name Updated Successfully');
    }
    public function classDelete($id)
    {
        $class = ClassName::findOrFail($id);
        $class->delete();

        return redirect('/class/list')->with('message','School Name Deleted  Successfully');

    }

}
