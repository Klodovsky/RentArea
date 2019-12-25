<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Moto;
use App\Photo;
use Illuminate\Http\Request;

class MotoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $motos = Moto::all();
        return view('motos.index',compact ('motos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Branch::pluck('name','id')->all();
        return view('motos.create', compact('branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();;
        if($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('public/images', $name);
            $photo = Photo::create(['file' => $name]);
            $input['photo_id'] = $photo->id;
        }
        Moto::create($input);
        return redirect('/motos');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $moto = Moto::findOrFail($id);
        $branches = Branch::pluck('name','id')->all();
        return view('motos.edit',  compact('branches','moto'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $moto = Moto::findOrFail($id);
        $input = $request->all();
        if($file = $request->file('photo_id')) { //verificam daca am ales poza din form
            $name = time() . $file->getClientOriginalName();
            $file->move('public/images', $name);
            $photo = Photo::create(['file' => $name]);
            $input['photo_id'] = $photo->id;
        }
        $moto->update($input);
        return redirect('/motos');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $moto = Moto::findOrFail($id);
        //unlink(public_path() . $moto->photo->file);
        $moto->delete();

        return redirect('/motos');
    }
}
