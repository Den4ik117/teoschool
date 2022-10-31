<?php

namespace App\Http\Requests\Dashboard;

use App\Enums\Part;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class CourseRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'name' => 'required|string|min:4|max:255',
            'parts' => 'required|in:' . implode(',', Part::values()),
            'description' => 'required|string|min:10'
        ];
    }
}
