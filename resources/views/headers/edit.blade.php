@extends('layouts.app')

@section('content')

    <form class="container" action="{{url("/headers/$header->id")}}" method="post">
    
        @csrf
        {{ method_field('PUT') }}

        <div class="row">

            <div class="col-md-4 my-2">
                <label for="title"> عنوان هدر </label>
                <input type="text" class="title form-control" name="title" id="title" value="{{$header->title}}">
            </div>
            
            <div class="col-md-4 my-2">
                <label for="btn-name"> نام دکمه </label>
                <input type="text" class="btn-name form-control" name="btn-name" id="btn-name" value="{{$header->btn_name}}">
            </div>
            
            <div class="col-md-4 my-2">
                <label for="btn-link"> لینک دکمه </label>
                <input type="text" class="btn-link form-control" name="btn-link" id="btn-link" value="{{$header->btn_link}}">
            </div>

            
            <div class="col-md-12 my-2">
                <label for="description"> متن هدر </label>
                <input type="text" class="description form-control" name="description" id="description" value="{{$header->description}}">
            </div>

            <div class="col-md-6 my-3">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="mobile">
                    <label class="custom-control-label" for="mobile"> اسلایدر موبایل را نمایش بده </label>
                </div>
            </div>

            <div class="col-md-6 my-3">
                <div class="custom-control custom-checkbox">
                    <input type="checkbox" class="custom-control-input" id="preloader">
                    <label class="custom-control-label" for="preloader"> لودینگ رو نمایش بده </label>
                </div>
            </div>

            <hr class="col-12">
            
            <div class="col-md-5"></div>
            <div class="col-md-2">
                <button type="submit" class="btn btn-primary btn-block">
                    <i class="ti-check ml-1"></i> 
                    تایید 
                </button>
            </div>

        </div>

    </form>

@endsection