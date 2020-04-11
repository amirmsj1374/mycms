@extends('layouts.app')

@section('content')

    <form action="{{url("contents/$section->id")}}" method="post" enctype="multipart/form-data">

        @csrf
        {{method_field("PUT")}}

        <div id="clone-box">
            @foreach ($contents as $content)

                <div class="row clone-row">

                    @include('fragments.clone_trash' , ['row_counts' => count($contents)])

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

        @include('fragments.cloner')

    </form>
    
    @endsection