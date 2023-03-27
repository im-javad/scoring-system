<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class newBadgeRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => ['required' , 'string' , 'min:3'],
            'description' => ['required' , 'string' , 'min:5'],
            'type' => ['required' , 'in:0,1,2'],
            'required_points' => ['required'],
            'icon_url' => ['required' , 'string' , 'min:3'],
        ]; 
    }
}
