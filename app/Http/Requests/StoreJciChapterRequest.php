<?php

namespace App\Http\Requests;

use App\Models\JciChapter;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StoreJciChapterRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('jci_chapter_create');
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
