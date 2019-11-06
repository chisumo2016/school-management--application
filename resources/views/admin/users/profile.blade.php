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


{{--                <form class="form-inline my-2 my-lg-0">--}}
{{--                    <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">--}}
{{--                    <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Search</button>--}}
{{--                </form>--}}

                <div class="table-responsive p-1">
                    <table id="" class="table table-striped table-bordered dt-responsive nowrap text-center" style="width: 100%;">
                        <thead>
                        <tr><td colspan="2"><img src="@if(isset($user->avatar)){{ asset('/') . '/'  . $user->avatar}} @else {{ asset('/') }} /admin/assets/images/avatar.png  @endif" alt=""></td></tr>

                        <tr><th>Name</th><td>{{ $user->name }}</td></tr>
                        <tr><th>Role</th><td>{{ $user->role }}</td></tr>

                        <tr><th>Mobile</th><td>{{ $user->mobile }}</td></tr>
                        <tr><th>Email</th><td>{{ $user->email }}</td></tr>
                        <tr><th>Action</th>
                            <td>
                                <a href="{{ route('change-user-info', ['id'=>$user->id]) }}" class="btn btn-sm btn-dark">Change Info</a>
                                <a href="{{ route('change-user-avatar', ['id'=>$user->id]) }}" class="btn btn-sm btn-info">Change Photo</a>
                                <a href="#" class="btn btn-sm btn-danger">Change Password</a>
                            </td>
                        </tr>
                        </thead>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--Content End-->
@endsection

