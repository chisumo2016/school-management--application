
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
                        <h4 class="text-center font-weight-bold font-italic mt-3">View Batch List</h4>
                    </div>
                </div>

                    <div class="table-responsive p-1">
                        <table id="" class="table table-striped table-bordered dt-responsive nowrap text-center" style="width: 100%;">
                            <tr>
                                <td>
                                    <div class="form-group row  mb-0">
                                        <label for="batchName" class="col-sm-3 col-form-label text-right">Class Name</label>
                                        <div class="col-sm-9">

                                            <select name="class_id" id="classId" class=" col-sm-9  form-control @error('class_id') is-invalid @enderror" required autofocus>
                                                <option value="">Select Class ....</option>

                                                @foreach($classes as $class)
                                                    <option value="{{ $class->id }}">{{$class->class_name  }}</option>
                                                @endforeach
                                            </select>
                                            @error('class_id')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>

                                    </div>
                                </td>
                            </tr>
                        </table>
                    </div>
                <div class="table-responsive">
                    <table class="table table-bordered table-hover text-center" id="batchList">



                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--Content End-->

    <script>
        $("#classId").change(function () {

            var id = $(this).val();
            if (id) {
                $.get("{{ route('batch-list-by-ajax') }}" , { id:id} , function (data) {
                    $("#batchList").html(data);
                })
            }
            //alert("hallo");
        })
    </script>
@endsection





