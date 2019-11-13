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
                        <h4 class="text-center font-weight-bold font-italic mt-3">View Schools List</h4>
                    </div>
                </div>
                    <table id="" class="table table-striped table-bordered dt-responsive nowrap text-center" style="width: 100%;">

                            <thead>
                            <tr>
                                <th>SI.</th>
                                <th>School Name</th>
                                <th>Status</th>
                                <th>Action</th>

                            </tr>
                            </thead>
                            <tbody>
                            @php($i=1)
                              @foreach($schools as $school)
                                  <tr>
                                      <td>{{$i++}}</td>
                                      <td>{{ $school->school_name }}</td>
                                      <td>{{ $school->status == 1 ? 'published' : 'unpublished' }}</td>
                                      <td>
                                          @if($school->status == 1)
                                                <a href="{{ route('school-unpublished',['id'=>$school->id]) }}"  title="unpublished" class="btn btn-success btn-sm fa fa-arrow-alt-circle-up"></a>
                                           @else
                                               <a href="{{ route('school-published',['id'=>$school->id]) }}"      title="published"    class="btn btn-warning btn-sm fa fa-arrow-alt-circle-down"></a>
                                            @endif
                                          <a href="{{ route('school-edit',['id'=>$school->id]) }}"    title="title"     class="btn btn-info btn-sm fa fa-edit"></a>
                                          <a href="{{ route('school-delete',['id'=>$school->id]) }}"   title="delete"    onclick="return confirm('if you want to delete this item press OK')"
                                             class="btn btn-danger btn-sm fa fa-trash-alt"></a>
                                      </td>
                                  </tr>
                              @endforeach
                            </tbody>

                    </table>
            </div>
        </div>
    </section>
    <!--Content End-->
@endsection





