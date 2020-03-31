@extends('layouts.app')

@section('content')
    <h2 class="dinar text-center text-primary"> نقشه سایت </h2>
    <hr>

    <div class="text-center p-3">

        <div class="card my-2">
            <div class="card-body">
                <span class="lead"> مدیریت منو </span>
            </div>
            <div class="card-footer text-left">
            <a href="" class="text-decoration-none"> <i class="ti-pencil s-1-5x mx-1 text-success" title="ویرایش"></i> </a>
                @if ( true )
                    <a href="" class="text-decoration-none"> <i class="ti-na s-1-5x mx-1 text-warning" title="عدم نمایش"></i> </a>         
                @else
                    <a href="" class="text-decoration-none"> <i class="ti-eye s-1-5x mx-1 text-warning" title="نمایش"></i> </a>    
                @endif
            </div>
        </div>
        

        <div class="card my-2">
            <div class="card-body">
                <span class="lead"> مدیریت هدر </span>
            </div>
            <div class="card-footer text-left">
                    <a href="{{url('headers/1/edit')}}" class="text-decoration-none"> <i class="ti-pencil s-1-5x mx-1 text-success" title="ویرایش"></i> </a>
                @if ( true )
                    <a href="" class="text-decoration-none"> <i class="ti-na s-1-5x mx-1 text-warning" title="عدم نمایش"></i> </a>         
                @else
                    <a href="" class="text-decoration-none"> <i class="ti-eye s-1-5x mx-1 text-warning" title="نمایش"></i> </a>    
                @endif
            </div>
        </div>

        <div class="card my-2">
            <div class="card-body">
                <span class="lead"> مدیریت فوتر</span>
            </div>
            <div class="card-footer text-left">
                <a href="" class="text-decoration-none"> <i class="ti-pencil s-1-5x mx-1 text-success" title="ویرایش"></i> </a>
                @if ( true )
                    <a href="" class="text-decoration-none"> <i class="ti-na s-1-5x mx-1 text-warning" title="عدم نمایش"></i> </a>         
                @else
                    <a href="" class="text-decoration-none"> <i class="ti-eye s-1-5x mx-1 text-warning" title="نمایش"></i> </a>    
                @endif
            </div>
        </div>

    </div>

@endsection
