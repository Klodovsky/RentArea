<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class BikeCreateRequest extends FormRequest
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
            'photo_id'=>'required',
            'price_per_day'=>'required',
            'type'=>'required',
            'bike_for'=>'required',
            'handlebar_width'=>'required',
            'max_weight'=>'required',
            'wheel_size'=>'required',
            'frame_size'=>'required',
            'chain'=>'required',
            'branch_id'=>'required'
        ];
    }

    public function attributes()
    {
        return [
            'name'=> 'Bike Name',
            'photo_id'=>'Featured Image',
            'price_per_day'=>'Price',
            'type'=>'Bike Type',
            'bike_for'=>'Bike For',
            'handlebar_width'=>'Handlebar width',
            'max_weight'=>'Maximum weight supported ',
            'wheel_size'=>'Wheel size',
            'frame_size'=>'Frame size',
            'chain'=>'Chain',
            'branch_id'=>'Location'
        ];
    }
}
