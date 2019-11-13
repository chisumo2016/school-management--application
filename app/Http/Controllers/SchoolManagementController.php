<?php

namespace App\Http\Controllers;

use App\School;
use Illuminate\Http\Request;

class SchoolManagementController extends Controller
{

    public function addSchoolForm()
    {
        return view('admin.settings.school.add-form');
    }

    public function schoolSave(Request $request)
    {
        $this->validate($request,[
            'school_name' => 'required|string'
        ]);

        $data = new School();
        $data->school_name  = $request->school_name;
        $data->status  = 1;
        $data->save();

        return back()->with('message','School Added Successfully');
    }

    public function schoolList()
    {
        $schools = School::all();
        return view('admin.settings.school.list', compact('schools'));
    }

    public function SchoolUnpublished($id)
    {
        $school = School::findOrFail($id);
        $school->status = 2;
        $school->save();

        return redirect('/school/list')->with('message','School was Unpublished Successfully');
    }

    public function SchoolPublished($id)
    {
        $school = School::findOrFail($id);
        $school->status = 1;
        $school->save();

        return redirect('/school/list')->with('message','School was Published Successfully');
    }

    public  function  schoolEdit($id)
    {
        $school = School::findOrFail($id);
        return view('admin.settings.school.edit-form',compact('school'));
    }

    public function schoolUpdate(Request $request)
    {
        $this->validate($request,[
            'school_name' => 'required|string'
        ]);
        $school = School::findOrFail($request->school_id);
        $school->school_name  = $request->school_name;
        $school->save();

        return redirect('/school/list')->with('message','School Updated  Successfully');
    }

    public function schoolDelete($id)
    {
        $school = School::findOrFail($id);
        $school->delete();

        return redirect('/school/list')->with('message','School Name Deleted  Successfully');

    }
}
