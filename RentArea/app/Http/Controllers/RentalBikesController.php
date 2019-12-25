<?php

namespace App\Http\Controllers;

use App\Bike;
use App\Branch;
use App\Http\Requests\ChooseBikeRequest;
use App\Http\Requests\SearchBikeRequest;
use App\RentalBikes;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class RentalBikesController extends Controller
{
    public function search(Request $request)
    {
        $branches = Branch::pluck('location', 'id')->all();
        return view('rent-a-bike.search-bike',compact('branches')   );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('/bike-reservations');
    }

    public function display()
    {
        $rentalbikes = RentalBikes::all();
        return view('rent-a-bike.index',compact('rentalbikes'));
    }

    public function choose_bike(SearchBikeRequest $request)
    {
        $bikes = Bike::all();
        $branch_pickup = Input::get('branch_pickup', false);
        $branch_return = Input::get('branch_return', false);
        $pickupDate = Input::get('pickupDate', false);
        $returnDate = Input::get('returnDate', false);
        $pickupTime = Input::get('pickupTime', false);
        $returnTime = Input::get('returnTime', false);
        $branches = Branch::all();
        return view('rent-a-bike.choose-bike',
            compact('bikes', 'branches', 'branch_pickup', 'branch_return', 'pickupDate', 'returnDate', 'pickupTime', 'returnTime'));
    }

    public function final_step(ChooseBikeRequest $request)
    {
        $bikes = Bike::all();
        $branch_pickup = Input::get('branch_pickup', false);
        $branch_return = Input::get('branch_return', false);
        $pickupDate = Input::get('pickupDate', false);
        $returnDate = Input::get('returnDate', false);
        $pickupTime = Input::get('pickupTime', false);
        $returnTime = Input::get('returnTime', false);
        $bike_id = Input::get('bike_id', false);
        $branches = Branch::all();
        return view('rent-a-bike.final-step',
            compact('bikes', 'branches', 'branch_pickup', 'branch_return', 'pickupDate', 'returnDate', 'pickupTime', 'returnTime','bike_id'));
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

        Session::flash('created_reservation_bike', 'One of our operators will call you to confirm your reservation');

        $input = $request->all();
        if($user = Auth::user()) {
            $user = Auth::user();
        } else {

            $this->validate($request, [
                'name' => 'required',
                'email' => 'required',
                'password' => 'required|confirmed|min:6',
            ]);;

            $name = $request->name;
            $email = $request->email;
            $city = $request->city;
            $phone = $request->phone;
            $role_id = '2';
            $is_active = '1';
            $password = bcrypt($request->password);
            $user = User::create(['name'=>$name, 'email'=>$email, 'city'=>$city, 'phone'=>$phone, 'role_id'=>$role_id, 'is_active'=>$is_active, 'password'=>$password]);
            Auth::login($user);
        }
        $user->rentalbikes()->create($input);
        return redirect('/rent-a-bike/completed-reservation');
    }

    public function completed_reservation() {
        return view('rent-a-bike.completed-reservation');
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
        //
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
        $rentalbikes = RentalBikes::FindOrFail($id);
        $input = $request->all();
        $rentalbikes->update($input);
        return redirect('/bike-reservations');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
