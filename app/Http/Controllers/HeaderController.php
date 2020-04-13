<?php

namespace App\Http\Controllers;

use App\Header;
use App\HeaderMobilePhoto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Symfony\Component\Console\Helper\Helper;

class HeaderController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function edit(Header $header)
    {
        return view('headers.edit', compact('header'));
    }

    public function update(Request $request, Header $header)
    {

        $data = $request->validate([
            "brand" => "nullable",
            "brand_picture" => "nullable|mimes:png,jpg,jpeg,bmp,tiff",
            "title" => "nullable",
            "btn-name" => "nullable",
            "btn-link" => "nullable",
            "description" => "nullable|string|max:1000",
            "mobile_visible" => "nullable|boolean",
            "preloader" => "nullable|boolean",
            "bg_path" => "nullable|mimes:png,jpg,jpeg,bmp,tiff|max:2000",
        ]);

            

        $data['bg_path'] = $request->bg_path ? HelperController::upload($request->bg_path, $header->bg_path) : null;
        $data['brand_picture']  = $request->brand_picture ? HelperController::upload($request->brand_picture, $header->brand_picture) : null;


        if ($sliders = $request->slider) {
            
            foreach ($sliders as $slider) {
               $path = HelperController::upload($slider);
               HeaderMobilePhoto::make($path);
            }

        }

        if ($photo_ids = $request->photo_ids) {
            foreach ($photo_ids as $id) {
                $photo_to_be_deleted = HeaderMobilePhoto::find($id);
                if (file_exists($photo_to_be_deleted->path)) {
                    File::delete($photo_to_be_deleted->path);
                }
                
                $photo_to_be_deleted->delete();
            }
        }
        
        $header->update($data);

        return back()->withMessage('هدر با موفقیت ویرایش شد. ');
    }

}
