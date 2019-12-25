<?php

namespace App\Http\Controllers;

use App\CarGearbox;
use Illuminate\Http\Request;

class CarGearboxController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $gearboxes = CarGearbox::all();
        return view('cars.gearboxes.index',compact('gearboxes'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $input = $request->all();
        CarGearbox::create($input);
        return redirect('/cars/gearboxes');
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
        $gearbox = CarGearbox::findOrFail($id);
        return view('cars.gearboxes.edit',compact('gearbox'));
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
        $input = $request->all();
        $gearbox = CarGearbox::findOrFail($id);
        $gearbox->update($input);
        return redirect('/cars/gearboxes');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $input = CarGearbox::findOrFail($id);
        $input->delete();
        return redirect('/cars/gearboxes');
    }
}
