<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PhotoController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
           'photo_id' => 'required|string',
           'photo' => 'required|file'
        ]);
        //dd($request->all());
        $photo = new \App\Models\Photo();
        $photo->idx = $request->photo_id;
        
        $path = $request->file('photo')->store('photos');
        //dd($path);
        $photo->file_path = $path;
        $photo->save();

        return back()->with(['successMessage'=>"Photo added Successfully"]);

    }


    public function create()
    {
        return view('admin.create-photo');
    }

    public function show(Request $request)
    {
        $photo = \App\Models\Photo::where('idx', $request->id)->first();
        
        if($photo == null){
            return "Photo not Found";
        }
        //dd($photo);
        //dd($request->id);
        return view('site.pages.show-photo')->with(['photo'=> $photo]);
    }
}
