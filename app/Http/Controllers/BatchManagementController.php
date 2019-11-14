<?php

namespace App\Http\Controllers;

use App\Batch;
use App\ClassName;
use Illuminate\Http\Request;

class BatchManagementController extends Controller
{
    public function addBatch()
    {
        $classes = ClassName::all();
        return view('admin.settings.batch.add',compact('classes'));
    }

    public function batchSave(Request $request)
    {
        $this->validate($request,[
           'class_id' => 'required',
           'batch_name' => 'required|string',
           'student_capacity' => 'required',
        ]);

        $data = new Batch();
        $data->class_id  = $request->class_id;
        $data->batch_name  = $request->batch_name;
        $data->student_capacity  = $request->student_capacity;
        $data->status =1;
        $data->save();

        return back()->with('message','Batch has been added successfully');
    }

    public function batchList ()
    {
        $classes = ClassName::all();
        return view('admin.settings.batch.batch-list',compact('classes'));
    }

    public function batchListbyAjax(Request $request)
    {
       $batches = Batch::where([
            'class_id' => $request->id
       ])->get();

       if (count($batches) > 0) {
           return view('admin.settings.batch.batch-list-by-ajax',compact('batches'));
       }else{
           return view('admin.settings.batch.batch-empty-error');
       }
    }

    public function batchUnpublished(Request $request)
    {
        $batch = Batch::findOrFail($request->batch_id);
        $batch->status =2;
        $batch->save();

        $batches = Batch::where([
            'class_id' => $request->class_id
        ])->get();

        return view('admin.settings.batch.batch-list-by-ajax',
            compact('batches'))->with('message','Batch Unpublished');
    }

    public function batchPublished(Request $request)
    {
        $batch = Batch::findOrFail($request->batch_id);
        $batch->status =1;
        $batch->save();

        $batches = Batch::where([
            'class_id' => $request->class_id
        ])->get();

        return view('admin.settings.batch.batch-list-by-ajax',
            compact('batches'))->with('message','Batch published');
    }

    public function batchDelete(Request $request)
    {
        $batch = Batch::findOrFail($request->batch_id);

        $batch->delete();

        $batches = Batch::where([
            'class_id' => $request->class_id
        ])->get();

        if (count($batches) > 0){
            return view('admin.settings.batch.batch-list-by-ajax',
                compact('batches'))->with('message','Batch published');
        }else{
            return view('admin.settings.batch.batch-empty-error');
        }

    }

    public function batchEdit($id)
    {
        $batch = Batch::findOrFail($id);

        $classes = ClassName::all();
        return view('admin.settings.batch.edit',compact('classes','batch'));
    }

    public function batchUpdate(Request $request)
    {
        $this->validate($request,[
            'class_id' => 'required',
            'batch_name' => 'required|string',
            'student_capacity' => 'required|string',
        ]);

        $batch = Batch::findOrFail($request->batch_id);

        $batch->class_id  = $request->class_id;
        $batch->batch_name  = $request->batch_name;
        $batch->student_capacity  = $request->student_capacity;
        $batch->save();

        return redirect('/batch/list')->with('message','Batch info updated succesfully');


    }











}
