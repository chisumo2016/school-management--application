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
                        <h4 class="text-center font-weight-bold font-italic mt-3">Add School Form</h4>
                    </div>
                </div>

                <form action=" {{ route('school-save') }}"   method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="table-responsive p-1">
                        <table id="" class="table table-striped table-bordered dt-responsive nowrap text-center" style="width: 100%;">
                            <tr>
                                <td>
                                    <div class="form-group row  mb-0">
                                        <label for="schoolName" class="col-sm-3 col-form-label text-right">School Name</label>
                                        <div class="col-sm-9">

                                            <input id="schoolName" type="text" class="col-sm-9 form-control" name="school_name" value="{{ old('school_name') }}" placeholder="Enter School Name" required>

                                            @error('school_name')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>

                                    </div>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <button class="btn btn-block my-btn-submit">Add School</button>
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

<script>
    function showImage(data, imgId) {
        if (data.files && data.files[0]) {
            var obj = new FileReader();

            obj.onload  = function (d) {
                var image  = document.getElementById(imgId);
                image.src  = d.target.result;
            };
            obj.readAsDataURL(data.files[0]);
        }
    }

</script>



