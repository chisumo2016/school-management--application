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
                        <h4 class="text-center font-weight-bold font-italic mt-3">View Class List</h4>
                    </div>
                </div>
                <table id="" class="table table-striped table-bordered dt-responsive nowrap text-center" style="width: 100%;">

                    <thead>
                    <tr>
                        <th>SI.</th>
                        <th>Class Name</th>
                        <th>Status</th>
                        <th>Action</th>

                    </tr>
                    </thead>
                    <tbody>
                    @php($i=1)
                    @foreach($classes as $class)
                        <tr>
                            <td>{{$i++}}</td>
                            <td>{{ $class->class_name }}</td>
                            <td>{{ $class->status == 1 ? 'published' : 'unpublished' }}</td>
                            <td>
                                @if($class->status == 1)
                                    <a href="{{ route('class-unpublished',['id'=>$class->id]) }}"  title="unpublished" class="btn btn-success btn-sm fa fa-arrow-alt-circle-up"></a>
                                @else
                                    <a href="{{ route('class-published',['id'=>$class->id]) }}"      title="published"    class="btn btn-warning btn-sm fa fa-arrow-alt-circle-down"></a>
                                @endif
                                <a href="{{ route('class-edit',['id'=>$class->id]) }}"    title="title"     class="btn btn-info btn-sm fa fa-edit"></a>
                                <a href="{{ route('class-delete',['id'=>$class->id]) }}"   title="delete"    onclick="return confirm('if you want to delete this item press OK')"
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





