<?php

namespace App\Http\Controllers\Api\V1\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreJciChapterRequest;
use App\Http\Requests\UpdateJciChapterRequest;
use App\Http\Resources\Admin\JciChapterResource;
use App\Models\JciChapter;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class JciChapterApiController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('jci_chapter_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JciChapterResource(JciChapter::with(['country'])->get());
    }

    public function store(StoreJciChapterRequest $request)
    {
        $jciChapter = JciChapter::create($request->all());

        return (new JciChapterResource($jciChapter))
            ->response()
            ->setStatusCode(Response::HTTP_CREATED);
    }

    public function show(JciChapter $jciChapter)
    {
        abort_if(Gate::denies('jci_chapter_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return new JciChapterResource($jciChapter->load(['country']));
    }

    public function update(UpdateJciChapterRequest $request, JciChapter $jciChapter)
    {
        $jciChapter->update($request->all());

        return (new JciChapterResource($jciChapter))
            ->response()
            ->setStatusCode(Response::HTTP_ACCEPTED);
    }

    public function destroy(JciChapter $jciChapter)
    {
        abort_if(Gate::denies('jci_chapter_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jciChapter->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
