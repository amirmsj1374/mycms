@extends('layouts.app')

@section('content')

<form action="{{url("sections")}}" method="post">

    @csrf

    <div class="row">

        <div class="form-group col-md-3 my-2 mr-auto">
          <label for="type"> نوع بخش </label>

                <select class="form-control" name="type" id="type" required>
                    <option value=""> -- انتخاب کنید -- </option>
                  @foreach ($section_types as $section_type)
                      <option value="{{$section_type}}"> {{ translate_section_types($section_type) }} </option>
                  @endforeach
                </select>
          
        </div>

        <div class="form-group col-md-3 my-2 ml-auto">
          <label for="position"> ترتیب </label>
          <input type="number" class="position form-control" name="position" id="position" value="{{$count+1}}" required>
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
