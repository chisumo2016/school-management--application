@extends('admin.master')

@section('main-content')
    <!--Content Start-->
    <section class="container-fluid">
        <div class="row content">
            <div class="col-md-8 offset-md-2 pl-0 pr-0">

                @if(Session::get('message'))
                    <div class="alert alert-warning alert-success fade show" role="alert">
                        <strong>Message !</strong> {{ Session::get('message') }}
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                @endif

                <div class="form-group">
                    <div class="col-sm-12">
                        <h4 class="text-center font-weight-bold font-italic mt-3">Edit Class Name</h4>
                    </div>
                </div>

                <form action=" {{ route('class-update') }}"   method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="table-responsive p-1">
                        <table id="" class="table table-striped table-bordered dt-responsive nowrap text-center" style="width: 100%;">
                            <tr>
                                <td>
                                    <div class="form-group row  mb-0">
                                        <label for="className" class="col-sm-3 col-form-label text-right">Class Name</label>
                                        <div class="col-sm-9">

                                            <input id="className" type="text" class="col-sm-9 form-control"   name="class_name" value="{{ $class->class_name  }}" placeholder="Enter Class Name" required>

                                            @error('class_name')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>

                                    </div>
                                </td>
                            </tr>
                            <input type="hidden" name="class_id" value="{{ $class->id }}">
                            <tr>
                                <td>
                                    <button class="btn btn-block my-btn-submit">Update Class Information</button>
                                </td>
                            </tr>

                        </table>
                    </div>
                </form>
            </div>
        </div>
    </section>
    <!--Content End-->
@endsection




