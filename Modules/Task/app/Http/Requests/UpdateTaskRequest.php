<?php

namespace Modules\Task\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTaskRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     */
    public function rules(): array
    {
        return [
            'title'=>['required','string','min:3','max:255'],
            'status'=>['required','string'],
            'file'=>['nullable','mimes:pdf,jpg,jpeg,png,webp,gif'],
            'note'=>['nullable','string','min:3','max:255'],
            'started_at'=>['required','date_format:Y-m-d'],
            'start_date_hour'=>['required','numeric','min:1','max:24'],
            'finished_at'=>['required','date_format:Y-m-d'],
            'end_date_hour'=>['required','numeric','min:1','max:24'],
            'users'=>['required','array'],
            'users.*'=>['required','exists:users,id'],
            'categories'=>['required','array'],
            'categories.*'=>['required','exists:categories,id'],
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }
}
