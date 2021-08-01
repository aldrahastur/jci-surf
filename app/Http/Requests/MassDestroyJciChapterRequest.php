<?php

namespace App\Http\Requests;

use App\Models\JciChapter;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Symfony\Component\HttpFoundation\Response;

class MassDestroyJciChapterRequest extends FormRequest
{
    public function authorize()
    {
        abort_if(Gate::denies('jci_chapter_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return true;
    }

    public function rules()
    {
        return [
            'ids'   => 'required|array',
            'ids.*' => 'exists:jci_chapters,id',
        ];
    }
}
