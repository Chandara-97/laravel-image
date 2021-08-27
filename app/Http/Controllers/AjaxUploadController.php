<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Photo;
class AjaxUploadController extends Controller
{
    public function index()
    {
        return view('image');
    }
 
    public function store(Request $request)
    {
         
       $request->validate([
         'image' => 'required|image|mimes:jpg,png,jpeg,gif,svg',
 
        ]);
 
        $name = $request->file('image')->getClientOriginalName();
 
        $path = $request->file('image')->store('public/images');
 
 
        $save = new Photo;
 
        $save->name = $name;
        $save->path = $path;
 
        $save->save();
 
        return response()->json($path);
 
    }
}
