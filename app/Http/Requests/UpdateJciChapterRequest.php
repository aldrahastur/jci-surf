<?php

namespace App\Http\Requests;

use App\Models\JciChapter;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class UpdateJciChapterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('jci_chapter_edit');
    }

    public function rules()
    {
        return [
            'name' => [
                'string',
                'nullable',
            ],
        ];
    }
}
