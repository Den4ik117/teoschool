<?php

namespace App\Http\Requests\Dashboard;

use App\Enums\Part;
use Illuminate\Foundation\Http\FormRequest;

class ModuleRequest extends FormRequest
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
            'course_id' => 'required|exists:courses,id',
            'part' => 'required|in:' . implode(',', Part::values()),
            'task' => 'required|string|min:4|max:255',
            'description' => 'required|string|max:255'
        ];
    }
}
