@extends('layouts.app')

@section('content')

    <form action="{{url("contents/$section->id")}}" method="post" enctype="multipart/form-data">

        @csrf
        {{method_field("PUT")}}

        <div class="row">

            <div class="form-group col-md-3 my-2">
                <label for="position"> ترتیب </label>
                <input type="number" class="form-control" name="position[]" id="position" value="">
            </div>

            @foreach ($section->inputs() as $input)
                @include("contents.partials.$input")
            @endforeach
            
        </div>

        <hr>
        
    </form>
    
        <div class="row add-row bg-secondary">
            <div class="col-md-2 mr-auto">
                <button class="btn btn-success btn-block text-light"> <i class="fa fa-plus ml-1"></i> مورد جدید </button>
            </div>

            <div class="col-md-2 ml-auto">
                <button class="btn btn-primary btn-block" type="submit"> <i class="fa fa-check ml-1"></i> تایید </button>
            </div>
        </div>

    @endsection