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
        ]);

        $data = new Batch();
        $data->class_id  = $request->class_id;
        $data->batch_name  = $request->batch_name;
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

        return view('admin.settings.batch.batch-list-by-ajax',compact('batches'));
    }








}
