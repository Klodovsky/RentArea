<?php

namespace App\Http\Controllers;

use App\Bike;
use App\Branch;
use App\Http\Requests\BikeCreateRequest;
use App\Photo;
use Illuminate\Http\Request;

class BikeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $bikes = Bike::all();
        return view('bikes.index',compact ('bikes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $branches = Branch::pluck('name','id')->all();
        return view('bikes.create', compact('branches'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(BikeCreateRequest $request)
    {
        $input = $request->all();;
        if($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('public/images', $name);
            $photo = Photo::create(['file' => $name]);
            $input['photo_id'] = $photo->id;
        }
        Bike::create($input);
        return redirect('/bikes');
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
        $bike = Bike::findOrFail($id);
        $branches = Branch::pluck('name','id')->all();
        return view('bikes.edit',  compact('branches','bike'));
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
        $bike = Bike::findOrFail($id);
        $input = $request->all();
        if($file = $request->file('photo_id')) { //verificam daca am ales poza din form
            $name = time() . $file->getClientOriginalName();
            $file->move('public/images', $name);
            $photo = Photo::create(['file' => $name]);
            $input['photo_id'] = $photo->id;
        }
        $bike->update($input);
        return redirect('/bikes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $bike = Bike::findOrFail($id);
        //unlink(public_path() . $bike->photo->file);
        $bike->delete();

        return redirect('/bikes');
    }
}
