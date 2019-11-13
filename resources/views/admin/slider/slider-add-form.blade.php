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
                        <h4 class="text-center font-weight-bold font-italic mt-3">Image Upload</h4>
                    </div>
                </div>

                <form action=" {{ route('upload-slide') }}"   method="post" enctype="multipart/form-data">
                    @csrf
                    <div class="table-responsive p-1">
                        <table id="" class="table table-striped table-bordered dt-responsive nowrap text-center" style="width: 100%;">
                            <tr><td><img src="{{ asset('/') }}/admin/assets/images/avatar.png" alt="" id="image_show" style="max-width: 400px"> </td></tr>
                            <tr>
                                <td>
                                    <div class="input-group">
                                        <div class="custom-file">
                                            <input  type="file" class="custom-file-input"  name="slide_image" id="avatar" onchange="showImage(this,'image_photo')">
                                            <label class="custom-file-label" for="inputGroupFile02" id="fileLabel">Choose file</label>
                                        </div>
                                    </div>

                                    @error('slide_image')
                                    <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                    @enderror

                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="form-group row  mb-0">
                                        <label for="title" class="col-sm-3 col-form-label text-right">Image Title</label>
                                        <div class="col-sm-9">

                                            <input id="slide_title" type="text" class="col-sm-9 form-control" name="slide_title" value="" placeholder="Image Title" required>

                                            @error('slide_title')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>

                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="form-group  row mb-0">
                                        <label for="slideDescription" class="col-sm-3 col-form-label text-right">Image Description</label>
                                        <div class="col-sm-9">
                                            <input id="slide_description" type="text" class="col-sm-9 form-control" name="slide_description" value="" placeholder="Image Description" required>

                                            @error('slide_description')
                                            <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                            @enderror
                                        </div>
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <div class="form-group  row mb-0">
                                            <label for="description" class="col-sm-3 col-form-label text-right">Publication Status</label>
                                            <div class="col-sm-9 text-left">
                                                <div class="form-check col-form-label">
                                                    <input type="radio" class="form-check-input" name="status" value="1">
                                                    <label for="" class="form-check-label">Published</label>
                                                </div>

                                                <div class="form-check col-form-label">
                                                    <input type="radio" class="form-check-input" name="status" value="2">
                                                    <label for="" class="form-check-label">Unpublished</label>
                                                </div>

                                            </div>
                                        @error('published_status')
                                        <span class="invalid-feedback" role="alert"><strong>{{ $message }}</strong></span>
                                        @enderror
                                    </div>
                                </td>
                            </tr>

                            <tr>
                                <td>
                                    <button class="btn btn-block my-btn-submit">Upload</button>
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



