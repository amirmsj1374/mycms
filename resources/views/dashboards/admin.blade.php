@extends('layouts.app')

@section('content')

    <div class="text-left">
        <a href="{{url("sections/create")}}" class="btn btn-primary"> <i class="ti-plus ml-1"></i> بخش جدید </a>
    </div>

    <h2 class="dinar text-center text-primary"> نقشه سایت </h2>
    <hr>

    <div class="text-center p-3">

        <div class="card my-2">
            <div class="card-body bg-success text-light">
                <span class="lead"> مدیریت منو </span>
            </div>
            <div class="card-footer text-left">
            <a href="{{url("menu")}}" class="text-decoration-none"> 
                <i class="ti-pencil s-1-5x mx-1 text-success" title=" ویرایش محتویات "></i> 
            </a>
            </div>
        </div>
        

        <div class="card my-2">
            <div class="card-body bg-dark text-light">
                <span class="lead"> مدیریت هدر </span>
            </div>
            <div class="card-footer text-left">
                    <a href="{{url('headers/1/edit')}}" class="text-decoration-none"> 
                        <i class="ti-pencil s-1-5x mx-1 text-success" title=" ویرایش محتویات "></i> 
                    </a>
            </div>
        </div>

        @foreach ($sections as $section)

            <div class="card my-2">
                <div class="card-body bg-info text-light">
                    <span class="lead"> {{ translate_section_types($section->type) }} </span>
                </div>
                <div class="card-footer text-left">
                        <a href="{{url("sections/$section->id/edit")}}" class="text-decoration-none mx-2"> 
                            <i class="fa fa-pencil s-1-5x text-success" title=" ویرایش "></i> 
                        </a>
                        <a href="{{url("contents/$section->id")}}" class="text-decoration-none mx-2"> 
                            <i class="fa fa-edit s-1-5x text-primary" title=" ویرایش محتوا "></i> 
                        </a>
                        <a href="javascript:void" class="text-decoration-none mx-2 text-danger danger-alert" data-target="section-{{$section->id}}">
                            <i class="fa fa-trash s-1-5x" title=" پاک کردن "></i> 
                        </a>
                        <form class="d-none" action="{{url("sections/$section->id")}}" method="post" id="section-{{$section->id}}">
                            @csrf
                            {{ method_field("DELETE") }}
                        </form>
                    @if ( $section->visible )
                    <a href="{{url("sections/visiblity/$section->id")}}" class="text-decoration-none mx-2"> <i class="fa fa-eye-slash s-1-5x text-secondary" title="عدم نمایش"></i> </a>         
                    @else
                        <a href="{{url("sections/visiblity/$section->id")}}" class="text-decoration-none mx-2"> <i class="fa fa-eye s-1-5x text-warning" title="نمایش"></i> </a>    
                    @endif
                </div>
            </div>

        @endforeach

        <div class="card my-2">
            <div class="card-body bg-dark text-light">
                <span class="lead"> مدیریت فوتر</span>
            </div>
            <div class="card-footer text-left">
            <a href="{{url('footers/1/edit')}}" class="text-decoration-none"> 
                <i class="ti-pencil s-1-5x mx-1 text-success" title=" ویرایش محتویات "></i>
            </a>
            </div>
        </div>

    </div>

@endsection
