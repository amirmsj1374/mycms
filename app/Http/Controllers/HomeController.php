<?php

namespace App\Http\Controllers;

use App\Message;
use App\Section;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin')->only(["show_messages"]);
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $current_user = auth()->user();
        if ($current_user->admin) {
            $sections = Section::orderBy('position')->get();
            return view('dashboards.admin' , compact('sections'));
        } else {
            return view('dashboards.user');
        }
        
    }

    public function show_messages()
    {
        $messages = Message::paginate(8);
        return view("messages.index", compact("messages"));
    }
}
