<?php

namespace App\Http\Controllers;

use App\Models\Fruite;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class JsonController extends Controller
{
    public function index()
    {
        $fruites = Fruite::where('parent_id', null)->orderBy('label')->get();
       
        return view('welcome', compact('fruites'));
    }

    public function update(Request $request)
    {
        $fruite = Fruite::find($request->id);
        $fruite->label = $request->label;
        $fruite->is_edited = true;
        $fruite->save();
        return redirect()->back();
    }
}
