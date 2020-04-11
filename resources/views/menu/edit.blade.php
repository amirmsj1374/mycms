@extends('layouts.app')

@section('content')

<form action="{{url('menu')}}" method="post">

    @csrf
    {{method_field("PUT")}}

    <div id="clone-box">
        <div class="row clone-row">

            @include('fragments.clone_trash' , ['row_counts' => 1])
            
            <div class="form-group col-md-2 my-2">
                <label for="position"> ترتیب </label>
                <input type="number" class="form-control" name="position[]" id="position" value="">
            </div>

            <div class="form-group col-md-3 my-2">
                <label for="name"> نام </label>
                <input type="text" class="form-control" name="name[]" id="name" value="">
            </div>

            <div class="form-group col-md-3 my-2">
                <label for="icon"> آیکون 
                    <a href="http://fontawesome.com/v4.7.0/icons/" class="mr-1" target="_blank"> مشاهده لیست آیکون ها </a>
                </label>
                <input type="text" class="form-control" name="icon[]" id="icon" value="">
            </div>
        </div>
    </div>

    @include('fragments.cloner')

</form>

@endsection