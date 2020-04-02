<?php

namespace App\Http\Controllers;

use App\Header;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class HeaderController extends Controller
{

    public function __construct()
    {
        $this->middleware('admin');
    }

    public function edit(Header $header)
    {
        return view('headers.edit', compact('header'));
    }

    public function update(Request $request, Header $header)
    {
        $data = $request->validate([
            "title" => "nullable",
            "btn-name" => "nullable",
            "btn-link" => "nullable",
            "description" => "nullable|string|max:1000",
            "mobile_visible" => "nullable|boolean",
            "preloader" => "nullable|boolean",
            "bg_path" => "nullable|mimes:png,jpg,jpeg,bmp,tiff|max:2000",
        ]);

        if ($photo = $request->bg_path) {

            if (file_exists($header->bg_path)) {
                File::delete($header->bg_path);
            }

            $file_name = HelperController::rs() . '.' . $photo->getClientOriginalExtension();
            $relative_path = "storage\app\public" ;
            $result = $photo->move(base_path($relative_path), $file_name);
            $data['bg_path'] = "storage/" . $file_name;

        }
        
        $header->update($data);

        return back()->withMessage('هدر با موفقیت ویرایش شد. ');
    }

}
