<?php

namespace App\Http\Controllers\Admin;

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
use Yajra\DataTables\Facades\DataTables;

class JciChapterController extends Controller
{
    use CsvImportTrait;

    public function index(Request $request)
    {
        abort_if(Gate::denies('jci_chapter_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        if ($request->ajax()) {
            $query = JciChapter::with(['country'])->select(sprintf('%s.*', (new JciChapter())->table));
            $table = Datatables::of($query);

            $table->addColumn('placeholder', '&nbsp;');
            $table->addColumn('actions', '&nbsp;');

            $table->editColumn('actions', function ($row) {
                $viewGate = 'jci_chapter_show';
                $editGate = 'jci_chapter_edit';
                $deleteGate = 'jci_chapter_delete';
                $crudRoutePart = 'jci-chapters';

                return view('partials.datatablesActions', compact(
                'viewGate',
                'editGate',
                'deleteGate',
                'crudRoutePart',
                'row'
            ));
            });

            $table->editColumn('id', function ($row) {
                return $row->id ? $row->id : '';
            });
            $table->editColumn('name', function ($row) {
                return $row->name ? $row->name : '';
            });
            $table->addColumn('country_name', function ($row) {
                return $row->country ? $row->country->name : '';
            });

            $table->rawColumns(['actions', 'placeholder', 'country']);

            return $table->make(true);
        }

        return view('admin.jciChapters.index');
    }

    public function create()
    {
        abort_if(Gate::denies('jci_chapter_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $countries = Country::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        return view('admin.jciChapters.create', compact('countries'));
    }

    public function store(StoreJciChapterRequest $request)
    {
        $jciChapter = JciChapter::create($request->all());

        return redirect()->route('admin.jci-chapters.index');
    }

    public function edit(JciChapter $jciChapter)
    {
        abort_if(Gate::denies('jci_chapter_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $countries = Country::pluck('name', 'id')->prepend(trans('global.pleaseSelect'), '');

        $jciChapter->load('country');

        return view('admin.jciChapters.edit', compact('countries', 'jciChapter'));
    }

    public function update(UpdateJciChapterRequest $request, JciChapter $jciChapter)
    {
        $jciChapter->update($request->all());

        return redirect()->route('admin.jci-chapters.index');
    }

    public function show(JciChapter $jciChapter)
    {
        abort_if(Gate::denies('jci_chapter_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $jciChapter->load('country', 'jciChapterUsers');

        return view('admin.jciChapters.show', compact('jciChapter'));
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
