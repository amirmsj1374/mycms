<?php

namespace App\Http\Controllers;

use App\Content;
use App\Section;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;

class SectionController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }
    
    public function create()
    {
        $section_types = ["features", "tabs", "prices", "cards", "faq", "clients", "posts"];
        $count = Section::count();
        $section = new Section;
        return view("sections.create_or_edit", compact('section_types' , 'count' , 'section'));
    }

    // post request to sections
    public function store(Request $request)
    {
        $data = self::validation();

        Section::create($data);

        return redirect("home")->withMessage(" بخش مورد نظراضافه شد. ");

    }

    public function show(Section $section)
    {
        //
    }

    public function edit(Section $section)
    {
        $section_types = ["features", "tabs", "prices", "cards", "faq", "clients", "posts"];
        return view("sections.create_or_edit", compact('section_types' , 'section'));
    }

    //put request sections/{id}
    public function update(Request $request, Section $section)
    {
        $data = self::validation();
        $section->update($data);
        return redirect("home")->withMessage(" بخش مورد نظر با موفقیت ویرایش شد. ");
    }

    public function destroy(Section $section)
    {
        $data = $section->contents()->get();
        $count = count($data); 
        $uploadables = Section::uploadable_contents();
        
        for ($i=0; $i < $count; $i++) { 
            foreach ($uploadables as $uploadable) {
               $prev_file = isset($data[$i]) ? $data[$i]->$uploadable : null ;
               HelperController::delete_file($prev_file);
            }
        }
        $section->contents()->delete();
        $section->delete();
        return back()->withMessage(" بخش مورد نظر حذف شد. ");
    }
    
    public function visiblity(Section $section)
    {
        $section->visible = !$section->visible;
        $section->save();
        return back()->withMessage(" تغییرات مورد نظر اعمال شد. ");
    }

    public static function validation()
    {
        return request()->validate([
            "type" => "required",
            "position" => "required",
            "title" => "nullable",
            "description" => "nullable",
        ]);
    }
}
