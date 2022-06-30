<?php

namespace App\Http\Controllers;

use App\Models\Fruit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class JsonController extends Controller
{
    public function index()
    {
        $fruits = Fruit::where('parent_id', null)->orderBy('label')->get();
       
        return view('welcome', compact('fruits'));
    }

    public function update(Request $request)
    {
        $fruit = Fruit::find($request->id);
        $fruit->label = $request->label;
        $fruit->is_edited = true;
        $fruit->save();
        return redirect()->back();
    }
}
