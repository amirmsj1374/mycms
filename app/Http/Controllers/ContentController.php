<?php

namespace App\Http\Controllers;

use App\Content;
use App\Section;
use Illuminate\Http\Request;

class ContentController extends Controller
{

    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show(Content $content)
    {
        //
    }

    public function edit(Section $section)
    {
        return view('contents.edit' , compact('section'));
    }

    public function update(Request $request, Content $content)
    {
        //
    }

    public function destroy(Content $content)
    {
        //
    }
}
