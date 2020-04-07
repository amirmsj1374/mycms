@extends('layouts.app')

@section('content')

    <form action="{{url("contents/$section->id")}}" method="post" enctype="multipart/form-data">

        @csrf
        {{method_field("PUT")}}

        <div id="clone-box">
            <div class="row clone-row">

                <div class="form-group col-md-3 my-2">
                    <label for="position"> ترتیب </label>
                    <input type="number" class="form-control" name="position[]" id="position" value="">
                </div>
    
                @foreach ($section->inputs() as $input)
                    @include("contents.partials.$input")
                @endforeach
                
                <hr class="col-md-11 my-4">
                
            </div>
        </div>

        <div class="row add-row bg-secondary">
            <div class="col-md-2 my-2 mr-auto">
                <a class="btn btn-success btn-block text-light" id="cloner"> <i class="fa fa-plus ml-1"></i> مورد جدید </a>
            </div>

            <div class="col-md-2 my-2 ml-auto">
                <button class="btn btn-primary btn-block" type="submit"> <i class="fa fa-check ml-1"></i> تایید </button>
            </div>
        </div>
    </form>
    
    @endsection