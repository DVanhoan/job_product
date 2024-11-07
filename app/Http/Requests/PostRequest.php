<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class PostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'job_title' => 'required|min:3',
            'job_level' => 'required',
            'vacancy_count' => 'required|int',
            'employment_type' => 'required',
            'job_location' => 'required',
            'salary' => 'required',
            'deadline' => 'required',
            'education_level' => 'required',
            'experience' => 'required',
            'skills' => 'required',
            'specifications' => 'sometimes|min:5',
        ];
    }


    public function messages()
    {
        return [
            'job_title.required' => 'Job title is required',
            'job_title.min' => 'Job title must be at least 3 characters',
            'job_level.required' => 'Job level is required',
            'vacancy_count.required' => 'Vacancy count is required',
            'vacancy_count.int' => 'Vacancy count must be an integer',
            'employment_type.required' => 'Employment type is required',
            'job_location.required' => 'Job location is required',
            'salary.required' => 'Salary is required',
            'deadline.required' => 'Deadline is required',
            'education_level.required' => 'Education level is required',
            'experience.required' => 'Experience is required',
            'skills.required' => 'Skills are required',
            'specifications.min' => 'Specifications must be at least 5 characters',
        ];
    }
}
