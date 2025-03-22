<?php

namespace App\Http\Requests;

use App\Enums\TaskEnums;
use App\Models\Task;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Gate;

class UpdateTaskRequest extends FormRequest
{

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            Task::USER_ID => 'required|uuid|exists:users,id',
            Task::TITLE => 'required|string',
            Task::DESCRIPTION => 'required|string',
            Task::DUE_DATE => 'required|date',
            Task::PRIORITY  =>'required|in:'.$this->priorityValues(),
            Task::STATUS => 'boolean',
        ];
    }

    private function priorityValues(): string
    {
        return implode(',', TaskEnums::get());
    }
}
