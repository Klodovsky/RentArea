<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class SearchMotoRequest extends FormRequest
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
            'branch_pickup' => 'required',
            'pickupDate' => 'required',
            'returnDate' => 'required',
            'pickupTime' => 'required',
            'returnTime' => 'required'
        ];
    }

    public function attributes()
    {
        return [
            'branch_pickup' => 'Pickup Location',
            'pickupDate' => 'Pickup Date',
            'returnDate' => 'Return Date',
            'pickupTime' => 'Pickup Time',
            'returnTime' => 'Return Time',
        ];
    }
}
