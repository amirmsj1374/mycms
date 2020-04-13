@extends('layouts.app')

@section('content')

<form action="{{url('menu')}}" method="post">

    @csrf
    {{method_field("PUT")}}

    <div id="clone-box">
        @foreach ($items as $item)
            <div class="row clone-row">

                @include('fragments.clone_trash' , ['row_counts' => count($items)])
                
                <div class="form-group col-md-1 my-2">
                    <label for="position"> ترتیب </label>
                    <input type="number" class="form-control" name="position[]" id="position" value="{{$item->position}}" required>
                </div>

                <div class="form-group col-md-2 my-2">
                    <label for="name"> نام </label>
                    <input type="text" class="form-control" name="name[]" id="name" value="{{$item->name}}">
                </div>

                <div class="form-group col-md-3 my-2">
                    <label for="icon"> آیکون 
                        <a href="http://fontawesome.com/v4.7.0/icons/" class="mr-1" target="_blank"> مشاهده لیست آیکون ها </a>
                    </label>
                    <input type="text" class="form-control" name="icon[]" id="icon" value="{{$item->icon}}">
                </div>

                <div class="form-group col-md-3 my-2">
                    <label for="external_link"> لینک خارجی </label>
                    <input type="text" class="form-control" name="external_link[]" id="external_link" value="@unless($item->link[0] == '#') {{$item->link}} @endunless">
                </div>

                <div class="form-group col-md-2 my-2">
                    <label for="internal_link"> لینک داخلی </label>
                        <select class="form-control" name="internal_link[]" id="internal_link">
                            <option value=""> -- انتخاب کنید -- </option>
                            @foreach ($sections as $section)
                                <option value="{{$section->id}}" @if($item->section_id() == $section->id) selected  @endif>
                                    {{$section->position}}- 
                                    {{translate_section_types($section->type)}} ({{$section->title}})
                                </option>
                            @endforeach
                        </select>
                </div>

            </div>
        @endforeach
    </div>

    @include('fragments.cloner')

</form>

@endsection