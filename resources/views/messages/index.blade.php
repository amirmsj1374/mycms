@extends('layouts.app')

@section('content')
    
    <table class="table table-bordered text-center">
        <thead>
            <tr>
                <th> نام </th>
                <th> موضوع </th>
                <th> ایمیل </th>
                <th>  متن پیام </th>
                <th>  عملیات </th>
            </tr>
        </thead>
        
        <tbody>

                @foreach ($messages as $message)
                    <tr>
                        <td>{{$message->name}}</td>
                        <td>{{$message->subject ?? "[ بدون عنوان ]"}}</td>
                        <td>{{$message->email}}</td>
                        <td>{{$message->message}}</td>
                        <td>
                            <a href="{{url("messages/delete/$message->id")}}">
                                <i class="ti-trash s-1-5x text-danger text-decoration-none"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach

        </tbody>

    </table>
    
    <div class="mt-4">
        {{$messages->links()}}
    </div>

@endsection