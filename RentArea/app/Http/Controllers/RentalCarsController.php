<?php

namespace App\Http\Controllers;

use App\Branch;
use App\CarGearbox;
use App\CarType;
use App\Car;
use App\Http\Requests\ChooseCarRequest;
use App\Http\Requests\SearchCarRequest;
use App\Photo;
use App\RentalCar;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class RentalCarsController extends Controller
{
    public function search(Request $request)
    {
        $branches = Branch::pluck('location', 'id')->all();
        return view('rent-a-car.search-car',compact('branches')   );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return redirect('/car-reservations');
    }

    public function display()
    {
        $rentalcars = RentalCar::all();
        return view('rent-a-car.index',compact('rentalcars'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function choose_car(SearchCarRequest $request)
    {
        $cars = Car::all();
        $branch_pickup = Input::get('branch_pickup', false);
        $branch_return = Input::get('branch_return', false);
        $pickupDate = Input::get('pickupDate', false);
        $returnDate = Input::get('returnDate', false);
        $pickupTime = Input::get('pickupTime', false);
        $returnTime = Input::get('returnTime', false);
        $branches = Branch::all();
        $transmissions  = CarGearbox::all();
        $types  = CarType::all();
        return view('rent-a-car.choose-car',
            compact('cars', 'branches', 'transmissions', 'types', 'branch_pickup', 'branch_return', 'pickupDate', 'returnDate', 'pickupTime', 'returnTime'));
    }

    public function additional_services(ChooseCarRequest $request)
    {
        $cars = Car::all();
        $branches = Branch::all();
        $branch_pickup = Input::get('branch_pickup', false);
        $branch_return = Input::get('branch_return', false);
        $pickupDate = Input::get('pickupDate', false);
        $returnDate = Input::get('returnDate', false);
        $pickupTime = Input::get('pickupTime', false);
        $returnTime = Input::get('returnTime', false);
        $car_id = Input::get('car_id', false);
        return view('rent-a-car.additional-services',
            compact('cars', 'branches', 'branch_pickup', 'branch_return', 'pickupDate', 'returnDate', 'pickupTime', 'returnTime','car_id'));
    }
    public function final_step()
    {
        $cars = Car::all();
        $branch_pickup = Input::get('branch_pickup', false);
        $branch_return = Input::get('branch_return', false);
        $pickupDate = Input::get('pickupDate', false);
        $returnDate = Input::get('returnDate', false);
        $pickupTime = Input::get('pickupTime', false);
        $returnTime = Input::get('returnTime', false);
        $car_id = Input::get('car_id', false);
        $garantie = Input::get('garantie', false);
        $branches = Branch::all();
        $car_gps = Input::get('car_gps', false);
        $car_baby_chair = Input::get('baby_chair', false);
        $car_child_seat = Input::get('child_seat', false);
        $car_wifi_price = Input::get('wifi_price', false);
        $car_snow_chains = Input::get('snow_chains', false);
        $car_sky_support = Input::get('sky_support', false);
        return view('rent-a-car.final-step',
            compact('cars', 'branches', 'branch_pickup', 'branch_return', 'pickupDate', 'returnDate', 'pickupTime', 'returnTime','car_id', 'garantie',
                'car_gps', 'car_baby_chair', 'car_child_seat', 'car_wifi_price', 'car_snow_chains', 'car_sky_support'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Contracts\Auth\Authenticatable
     */
    public function store(Request $request)
    {

        Session::flash('created_reservation_car', '');

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
            $flight_number = $request->flight_number;
            $reservation_info = $request->reservation_info;
            $role_id = '2';
            $is_active = '1';
            $password = bcrypt($request->password);
            $user = User::create(['name'=>$name, 'email'=>$email, 'city'=>$city, 'phone'=>$phone, 'role_id'=>$role_id, 'is_active'=>$is_active, 'password'=>$password]);
            Auth::login($user);
        }

        $user->rentalcars()->create($input);

        return redirect('/completed-reservation');
    }

    public function completed_reservation() {
        return view('rent-a-car.completed-reservation');
    }

    /* profil client */

    public function user_profile() {
        return view('user.user-profile');
    }

    public function user_edit() {
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        return view('user.user-edit',compact ('user'));
    }

    public function user_update(Request $request) {

        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        $input = $request->all();
        if($file = $request->file('photo_id')) {
            $name = time() . $file->getClientOriginalName();
            $file->move('images',$name);
            $photo = Photo::create(['file' => $name]);
            $input['photo_id'] = $photo->id;
        }
        $user->update($input);
        return redirect('/user/my-account');
    }

    public function user_reservations() {
        $rentalcars = RentalCar::all();
        $id = Auth::user()->id;
        $user = User::findOrFail($id);
        return view('user.user-reservations',compact ('user','rentalcars'));
    }

    /* profil client */

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
        $rentalcars = RentalCar::FindOrFail($id);
        $input = $request->all();
        $rentalcars->update($input);
        return redirect('/car-reservations');
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
