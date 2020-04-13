<?php

namespace App\Http\Controllers;

use App\Header;
use Illuminate\Http\Request;

class AjaxController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function main($method)
    {
        if (method_exists($this , $method)) {
            $this->$method();
        } else {
            abort(404);
        }
    }

    public function delete_brand()
    {
        $header = Header::find(request('myId'));
        $header->brand_picture = null;
        $header->save();
    }
}
