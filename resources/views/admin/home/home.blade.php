@extends('admin.master')

@section('main-content')

    @if(Session::get('message'))
        <div class="alert alert-warning alert-success " role="alert">
            <strong>Message !</strong> {{ Session::get('message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    @if(Session::get('error_message'))
        <div class="alert alert-warning alert-danger fade show" role="alert">
            <strong>Error !</strong> {{ Session::get('error_message') }}
            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                <span aria-hidden="true">&times;</span>
            </button>
        </div>
    @endif

    <section class="container-fluid">
        <div class="row">
            <div class="col-12 pl-0 pr-0">
                <div class="owl-carousel">
                    @foreach($sliders as  $slider)
                        <div class="item">
                            <img src="{{ asset('/')}}{{ $slider->slide_image }}" alt="">
                            <div class="slide-caption text-center">
                                <h2>{{ $slider->slide_title }}</h2>
                                <p>{{ $slider->slide_description }}</p>
                            </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection

{{--                    <div class="item"><img src="{{ asset('admin/assets/images/img-2.jpg') }}" alt=""></div>--}}
{{--                    <div class="item"><img src="{{ asset('admin/assets/images/img-3.jpg') }}" alt=""></div>--}}
{{--                    <div class="item"><img src="{{ asset('admin/assets/images/img-4.jpg') }}" alt=""></div>--}}
{{--                    <div class="item"><img src="{{ asset('admin/assets/images/img-5.jpg') }}" alt=""></div>--}}
{{--                    <div class="item"><img src="{{ asset('admin/assets/images/img-6.jpg') }}" alt=""></div>--}}
{{--                    <div class="item"><img src="{{ asset('admin/assets/images/img-7.jpg') }}" alt=""></div>--}}
{{--                    <div class="item"><img src="{{ asset('admin/assets/images/img-8.jpg') }}" alt=""></div>--}}
