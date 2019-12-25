<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarCreateRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'=> 'required',
            'type_id'=>'required',
            'ac'=>'required',
            'gearbox_id'=>'required',
            'passengers'=>'required',
            'doors'=>'required',
            'capacity'=>'required',
            'price_per_day_car'=>'required',
            'branch_id'=>'required',
            'fuel_id'=>'required',
            'photo_id'=>'required'
        ];
    }

    public function attributes()
    {
        return [
            'name'=> 'Car Name',
            'type_id'=>'Car Type',
            'ac'=>'AC',
            'gearbox_id'=>'Gearbox Type',
            'passengers'=>'No. Passengers',
            'doors'=>'No. Doors',
            'capacity'=>'Car Capacity (Bags)',
            'price_per_day_car'=>'Car Price',
            'branch_id'=>'Location',
            'fuel_id'=>'Fuel Type',
            'photo_id'=>'Featured Image'
        ];
    }
}
