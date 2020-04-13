@extends('layouts.app')

@section('content')

    <form action="{{url("/headers/$header->id")}}" method="post" enctype="multipart/form-data">
    
        @csrf
        {{ method_field('PUT') }}

        <div class="row">

            <h3 class="col-12 dinar text-info mb-4"> ویرایش هدر </h3>

                <div class="form-group col-md-3 my-2">
                    <label for="brand"> نام برند </label>
                    <input type="text" class="form-control" name="brand" id="brand" value="{{$header->brand}}">
                </div>
                
                <div class="form-group col-md-3 my-2">
                    <label for="brand_picture"> تصویر برند </label>
                    <input type="file" class="form-control" name="brand_picture" id="brand_picture">
                </div>

                @if ($header->brand_picture)
                    <div class="col-md-2 my-2 mr-4 delete-brand">
                        <div class="card">
                            <div class="card-body">
                                <img src="{{asset($header->brand_picture)}}" class="img-fluid">
                            </div>
                            <div class="card-footer text-center">
                                <a href="javascript:void" class="text-decoration-none" onclick="deleteBrandPicture({{$header->id}})"> 
                                    <i class="ti-trash text-danger s-1-5x"></i> 
                                </a>
                            </div>
                        </div>
                    </div>
                @endif
                
                <hr class="col-12">

            <div class="col-md-3 my-2">
                <label for="title"> عنوان هدر </label>
                <input type="text" class="title form-control" name="title" id="title" value="{{$header->title}}">
            </div>
            
            <div class="col-md-3 my-2">
                <label for="btn-name"> نام دکمه </label>
                <input type="text" class="btn-name form-control" name="btn_name" id="btn-name" value="{{$header->btn_name}}">
            </div>
            
            <div class="col-md-3 my-2">
                <label for="btn-link"> لینک دکمه </label>
                <input type="text" class="btn-link form-control" name="btn_link" id="btn-link" value="{{$header->btn_link}}">
            </div>

            <div class="col-md-3 my-2">
                <label for="background"> تصویر پس زمینه </label>
                <input type="file" class="background form-control" name="bg_path" id="background">
            </div>

            
            <div class="col-md-12 my-2">
                <label for="description"> متن هدر </label>
                <input type="text" class="description form-control" name="description" id="description" value="{{$header->description}}">
            </div>

            <div class="col-md-6 my-3">
                <div class="custom-control custom-checkbox">
                    <input type="hidden" name="mobile_visible" value="0">
                    <input type="checkbox" class="custom-control-input" name="mobile_visible" id="mobile" value="1" @if ($header->mobile_visible) checked @endif>
                    <label class="custom-control-label" for="mobile"> اسلایدر موبایل را نمایش بده </label>
                </div>
            </div>

            <div class="col-md-6 my-3">
                <div class="custom-control custom-checkbox">
                    <input type="hidden" name="preloader" value="0">
                    <input type="checkbox" class="custom-control-input" name="preloader" id="preloader" value="1" @if ($header->preloader) checked @endif>
                    <label class="custom-control-label" for="preloader"> لودینگ رو نمایش بده </label>
                </div>
            </div>

            <hr class="col-12">

            <h3 class="col-12 dinar text-info mb-4"> عکس های اسلایدر  </h3>

            @foreach ($header->photos as $photo)
                
                <div class="col-md-3 my-2">
                    <div class="card">
                        <div class="card-body">
                            <img src="{{asset($photo->path)}}" class="img-fluid">
                        </div>
                        <div class="card-footer text-center">
                            <a href="javascript:void" class="text-decoration-none delete-photo" data-photo-id="{{$photo->id}}"> 
                                <i class="ti-trash text-danger s-2x"></i> 
                            </a>
                        </div>
                    </div>
                </div>

            @endforeach

            <hr class="col-12">

            <div class="col-md-3 my-2 ml-auto mr-auto">
                <label for="slider"> آپلود عکس جدید برای اسلایدر </label>
                <input type="file" class="slider form-control" name="slider[]" id="slider" multiple>
            </div>
            
        </div>

        <hr class="col-12">

        <div id="photos-to-be-deleted">
            {{-- this div will be filled via jQuery --}}
        </div>

        <div class="row">
            <div class="col-md-2 ml-auto mr-auto">
                <button type="submit" class="btn btn-primary btn-block">
                    <i class="ti-check ml-1"></i> 
                    تایید 
                </button>
            </div>
        </div>

    </form>

@endsection