<?php

namespace App\Http\Controllers;

use App\Content;
use App\Section;
use Illuminate\Http\Request;

class ContentController extends Controller
{

    public function edit(Section $section)
    {
        $contents = count($section->contents) ? $section->contents : [new Section] ;
        return view('contents.edit' , compact('section' , 'contents'));
    }

    public function update(Request $request, Section $section)
    {
        $request->validate(['position'=>'required']);
        $result = self::prepare($request->all(), $section->id);
        $section->contents()->delete();
        Content::insert($result);
        return back()->withMessage(" اطلاعات وارد شده ثبت شد. ");
    }

    public function destroy(Section $section)
    {
        //
    }

    public static function prepare($data , $section_id)
    {
        $result = [];
        foreach ($data as $x => $array) {
            if (is_array($array)) {
                foreach ($array as $y => $value) {
                    $result[$y][$x] = $value;
                    $result [$y]['section_id'] = $section_id;
                }
            }
        }

        return $result;
    }
}
