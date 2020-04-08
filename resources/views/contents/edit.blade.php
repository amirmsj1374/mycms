@extends('layouts.app')

@section('content')

    <form action="{{url("contents/$section->id")}}" method="post" enctype="multipart/form-data">

        @csrf
        {{method_field("PUT")}}

        <div id="clone-box">
            @foreach ($contents as $content)

                <div class="row clone-row">

                    <div class="col-md-1 my-2">
                        <a class="btn btn-link text-decoration-none mt-4 mr-2 delete-clone-row" style="@if(count($contents)==1) display:none @endif" title=" حذف ">
                            <i class="fa fa-trash fa-2x text-danger"></i>
                        </a>
                    </div>

                    <div class="form-group col-md-2 my-2">
                        <label for="position"> ترتیب </label>
                    <input type="number" class="form-control" name="position[]" id="position" value="{{$content->position}}" required>
                    </div>
        
                    @foreach ($section->inputs() as $input)
                        @include("contents.partials.$input")
                    @endforeach
                    
                    <hr class="col-md-11 my-4">
                    
                </div>
            @endforeach
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