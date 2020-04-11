@extends('layouts.app')

@section('content')

<form action="{{url("sections/$section->id")}}" method="post">

    @csrf
    @if ($section->id)
        {{method_field("PUT")}}
    @endif

    <div class="row">

        <div class="form-group col-md-3 my-2 mr-auto">
          <label for="type"> نوع بخش </label>

                <select class="form-control" name="type" id="type" required>
                    <option value=""> -- انتخاب کنید -- </option>
                  @foreach ($section_types as $section_type)
                      <option value="{{$section_type}}" @if( $section_type == $section->type ) selected  @endif>
                        {{ translate_section_types($section_type) }}
                      </option>
                  @endforeach
                </select>
          
        </div>

        <div class="form-group col-md-3 my-2">
            <label for="position"> ترتیب </label>
            <input type="number" class="position form-control" name="position" id="position" value="{{ $section->id ? $section->position : $count+1 }}" required>
        </div>

        <div class="form-group col-md-3 my-2 ml-auto">
            <label for="title"> عنوان </label>
            <input type="text" class="title form-control" name="title" id="title" value="{{$section->title}}">
        </div>

        <div class="form-group col-md-12 my-2">
          <label for="description"> توضیحات </label>
          <textarea class="form-control" name="description" id="description" rows="3">{{$section->description}}</textarea>
        </div>

    </div>

    <hr>

    <div class="row">
        <div class="col-md-2 mr-auto ml-auto">
            <button class="btn btn-primary btn-block" type="submit"> <i class="ti-check-box ml-1"></i> تایید </button>
        </div>
    </div>

</form>

@endsection
