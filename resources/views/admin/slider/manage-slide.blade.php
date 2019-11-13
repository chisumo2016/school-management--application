@extends('admin.master')
@section('main-content')
    <!--Content Start-->
    <section class="container-fluid">
        <div class="row content">
            <div class="col-12 pl-0 pr-0">
                <div class="form-group">
                    <div class="col-sm-12">
                        <h4 class="text-center font-weight-bold font-italic mt-3">Slide List</h4>
                    </div>
                </div>

                <div class="table-responsive p-1">
                    <table id="example" class="table table-striped table-bordered dt-responsive nowrap text-center" style="width: 100%;">
                        <thead>
                        <tr>
                            <th>Sl.</th>
                            <th>Slide Title</th>
                            <th>Slide Description</th>
                            <th>Slide Image</th>
                            <th>Status</th>
                            <th style="width: 100px;">Action</th>
                        </tr>
                        </thead>
                        <tbody>
                           @php($i=1)
                            @foreach($slides as $slide)
                                <tr>
                                    <td>{{ $i++ }}</td>
                                    <td>{{ $slide->slide_title }}</td>
                                    <td>{{ $slide->slide_description }}</td>
                                    <td><img src="{{ asset('/') }}{{$slide->slide_image}}"  style="width: 150px" alt=""></td>
                                    <td>{{ $slide->status  == 1 ? 'Published' : 'Unpublished' }}</td>
                                    <td>
                                        @if($slide->status  == 1)
                                        <a href="{{ route('slide-unpublished',['id'=>$slide->id]) }}" title="Deactivate" class="btn btn-sm btn-success fa fa-arrow-alt-circle-up"></a>
                                        @else
                                        <a href="{{ route('slide-published',['id'=>$slide->id]) }}"  title="activate" class="btn btn-sm btn-warning fa fa-arrow-alt-circle-down"></a>
                                        @endif
                                        <a href="" class="btn btn-sm btn-danger fa fa-trash-alt"></a>
                                    </td>
                                </tr>
                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>
    <!--Content End-->
@endsection

