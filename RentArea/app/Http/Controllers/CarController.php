<?php

namespace App\Http\Controllers;

use App\Branch;
use App\Car;
use App\CarFuel;
use App\Http\Requests\CarCreateRequest;
use App\Photo;
use App\CarType;
use App\CarGearbox;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CarController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cars = Car::all();
        return view('cars.index',compact ('cars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $fuels = CarFuel::pluck('name','id')->all();
        $types = CarType::pluck('name','id')->all();
        $gearboxes = CarGearbox::pluck('name','id')->all();
        $branches = Branch::pluck('name','id')->all();
        return view('cars.create', compact('fuels', 'types', 'branches', 'gearboxes'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CarCreateRequest $request)
    {
        $input = $request->all();;
        if($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('public/images', $name);
            $photo = Photo::create(['file' => $name]);
            $input['photo_id'] = $photo->id;
        }
        Car::create($input);
        return redirect('/cars');
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
        $car = Car::findOrFail($id);
        $fuels = CarFuel::pluck('name','id')->all();
        $types = CarType::pluck('name','id')->all();
        $gearboxes = CarGearbox::pluck('name','id')->all();
        $branches = Branch::pluck('name','id')->all();
        return view('cars.edit',  compact('car', 'fuels', 'types', 'branches', 'gearboxes'));
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
        $car = Car::findOrFail($id);
        $input = $request->all();
        if($file = $request->file('photo_id')) { //verificam daca am ales poza din form
            $name = time() . $file->getClientOriginalName();
            $file->move('public/images', $name);
            $photo = Photo::create(['file' => $name]);
            $input['photo_id'] = $photo->id;
        }
        $car->update($input);
        return redirect('/cars');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $car = Car::findOrFail($id);
        //unlink(public_path() . $car->photo->file);
        $car->delete();

        return redirect('/cars');
    }
}
