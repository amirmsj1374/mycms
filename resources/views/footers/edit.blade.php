@extends('layouts.app')

@section('content')

    <form action="{{url("/footers/$footer->id")}}" method="post">
    
        @csrf
        {{ method_field('PUT') }}

        <div class="row">

            <h3 class="col-12 dinar text-info mb-4"> ویرایش فوتر </h3>

            <div class="col-md-4 my-2">
                <label for="title"> عنوان فوتر </label>
                <input type="text" class="title form-control" name="title" id="title" value="{{$footer->title}}">
            </div>

            <div class="col-md-8 my-2">
                <label for="address"> آدرس </label>
                <input type="text" class="address form-control" name="address" id="address" value="{{$footer->address}}">
            </div>

            <div class="col-md-6 my-2">
                <label for="description_1"> توضیحات اول </label>
                <textarea name="description_1" class="description_1 form-control" id="description_1" rows="4">{{$footer->description_1}}</textarea>
            </div>

            <div class="col-md-6 my-2">
                <label for="description_2"> توضیحات دوم </label>
                <textarea name="description_2" class="description_2 form-control" id="description_2" rows="4">{{$footer->description_2}}</textarea>
            </div>

            <div class="col-md-6 my-2">
                <label for="telephones"> شماره تلفن ها </label>
                <textarea name="telephones" class="telephones form-control" id="telephones" rows="4">{{$footer->telephones_with_line_breaks()}}</textarea>
            </div>

            <div class="col-md-6 my-2">
                <label for="emails"> ایمیل ها </label>
                <textarea name="emails" class="emails form-control" id="emails" rows="4">{{$footer->emails_with_line_breaks()}}</textarea>
            </div>

            <div class="col-md-2 my-2">
                <label class="open-sans" for="facebook"> Facebook </label>
                <input type="text" class="facebook form-control" name="facebook" id="facebook" value="{{$footer->facebook}}">
            </div>
            <div class="col-md-2 my-2">
                <label class="open-sans" for="twitter"> Twitter </label>
                <input type="text" class="twitter form-control" name="twitter" id="twitter" value="{{$footer->twitter}}">
            </div>
            <div class="col-md-2 my-2">
                <label class="open-sans" for="google"> Google </label>
                <input type="text" class="google form-control" name="google" id="google" value="{{$footer->google}}">
            </div>
            <div class="col-md-2 my-2">
                <label class="open-sans" for="linkedin"> LinkedIn </label>
                <input type="text" class="linkedin form-control" name="linkedin" id="linkedin" value="{{$footer->linkedin}}">
            </div>
            <div class="col-md-2 my-2">
                <label class="open-sans" for="instagram"> Instagram </label>
                <input type="text" class="instagram form-control" name="instagram" id="instagram" value="{{$footer->instagram}}">
            </div>
            <div class="col-md-2 my-2">
                <label class="open-sans" for="telegram"> Telegram </label>
                <input type="text" class="telegram form-control" name="telegram" id="telegram" value="{{$footer->telegram}}">
            </div>
            
        </div>

        <hr class="col-12">

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