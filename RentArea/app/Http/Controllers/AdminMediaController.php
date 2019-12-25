<?php

namespace App\Http\Controllers;

use App\Photo;
use Illuminate\Http\Request;

class AdminMediaController extends Controller
{
    public function index()
    {
        $photos = Photo::all();
        return view('admin.media.index',compact('photos'));
    }

    public function create()
    {
        return view('admin.media.create');
    }

    public function store(Request $request)
    {
        $file = $request->file('file'); //face request din baaza de date
        $name = time() . $file->getClientOriginalName(); //numele fisierului
        $file->move('public/images', $name); //muta fisierul in images

        Photo::create(['file'=>$name]); //se creaza fisierul
    }
    public function destroy($id)
    {
        $input = Photo::findOrFail($id);
        $input->delete();
        return redirect('/admin/media');
    }


}
