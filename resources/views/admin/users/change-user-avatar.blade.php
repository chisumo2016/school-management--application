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
                            <h4 class="text-center font-weight-bold font-italic mt-3">{{ $user->name }}  Profile</h4>
                        </div>
                    </div>

               <form action="{{ route('update-user-photo') }}"   method="post" enctype="multipart/form-data">
                    @csrf
                   <div class="table-responsive p-1">
                        <table id="" class="table table-striped table-bordered dt-responsive nowrap text-center" style="width: 100%;">
                        <tr><td><img src="{{ asset('/') }}/admin/assets/images/avatar.png" alt="" id="profile_photo" style="max-width: 400px"> </td></tr>
                        <tr>
                            <td>
                                <div class="input-group">
                                    <div class="custom-file">
                                        <input  type="file" class="custom-file-input"  name="avatar" id="avatar" onchange="showImage(this,'profile_photo')">
                                        <label class="custom-file-label" for="inputGroupFile02" id="fileLabel">Choose file</label>
                                    </div>
                                </div>

                            </td>
                        </tr>
                        <input type="hidden" name="user_id" value="{{ $user->id }}">

                        <tr><td><button class="byn btn-block my-btn-submit" type="submit">Update Photo</button></td></tr>

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

