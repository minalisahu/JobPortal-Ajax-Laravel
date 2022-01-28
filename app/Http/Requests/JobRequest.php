<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class JobRequest extends FormRequest
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
        $rules = array(
            'skills' => 'required',
            'job_title' => 'required|string|max:255',
            'description' => 'required',
            'exp_in_month' => 'nullable|string',
            'exp_in_year' => 'nullable|string',
        );
        return $rules;
    }
}
