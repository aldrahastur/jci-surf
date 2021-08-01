<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Traits\CsvImportTrait;
use App\Http\Requests\MassDestroyJciChapterRequest;
use App\Http\Requests\StoreJciChapterRequest;
use App\Http\Requests\UpdateJciChapterRequest;
use App\Models\Country;
use App\Models\JciChapter;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JciChapterController extends Controller
{
    use CsvImportTrait;

    public function index()
    {
        abort_if(Gate::denies('jci_chapter_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jciChapters = JciChapter::with(['country'])->get();

        return view('frontend.jciChapters.index', compact('jciChapters'));
    }

    public function create()
    {
        abort_if(Gate::denies('jci_chapter_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $countries = Country::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('frontend.jciChapters.create', compact('countries'));
    }

    public function store(StoreJciChapterRequest $request)
    {
        $jciChapter = JciChapter::create($request->all());

        return redirect()->route('frontend.jci-chapters.index');
    }

    public function edit(JciChapter $jciChapter)
    {
        abort_if(Gate::denies('jci_chapter_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $countries = Country::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $jciChapter->load('country');

        return view('frontend.jciChapters.edit', compact('countries', 'jciChapter'));
    }

    public function update(UpdateJciChapterRequest $request, JciChapter $jciChapter)
    {
        $jciChapter->update($request->all());

        return redirect()->route('frontend.jci-chapters.index');
    }

    public function show(JciChapter $jciChapter)
    {
        abort_if(Gate::denies('jci_chapter_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jciChapter->load('country');

        return view('frontend.jciChapters.show', compact('jciChapter'));
    }

    public function destroy(JciChapter $jciChapter)
    {
        abort_if(Gate::denies('jci_chapter_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jciChapter->delete();

        return back();
    }

    public function massDestroy(MassDestroyJciChapterRequest $request)
    {
        JciChapter::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
