<?php

namespace App\Http\Controllers;

use App\Header;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;
use phpDocumentor\Reflection\Types\This;

class HelperController extends Controller
{

    public static function upload($new_file, $prev_file=null) {
        
        HelperController::delete_file($prev_file);
        
        $file_name = HelperController::rs() . '.' . $new_file->getClientOriginalExtension();
        $relative_path = "storage\app\public" ;
        $result = $new_file->move(base_path($relative_path), $file_name);
        return "storage/" . $file_name;

    }

    public static function rs($length = 10) {
        $characters = '0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $charactersLength = strlen($characters);
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $characters[rand(0, $charactersLength - 1)];
        }
        return $randomString;
    }

    public static function delete_file ($file) {
        if ( $file && file_exists($file)) {
            File::delete($file);
        }
    }
}

