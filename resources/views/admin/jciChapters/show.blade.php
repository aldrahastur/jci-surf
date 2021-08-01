@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.jciChapter.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.jci-chapters.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.jciChapter.fields.id') }}
                        </th>
                        <td>
                            {{ $jciChapter->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jciChapter.fields.name') }}
                        </th>
                        <td>
                            {{ $jciChapter->name }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.jciChapter.fields.country') }}
                        </th>
                        <td>
                            {{ $jciChapter->country->name ?? '' }}
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.jci-chapters.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>

<div class="card">
    <div class="card-header">
        {{ trans('global.relatedData') }}
    </div>
    <ul class="nav nav-tabs" role="tablist" id="relationship-tabs">
        <li class="nav-item">
            <a class="nav-link" href="#jci_chapter_users" role="tab" data-toggle="tab">
                {{ trans('cruds.user.title') }}
            </a>
        </li>
    </ul>
    <div class="tab-content">
        <div class="tab-pane" role="tabpanel" id="jci_chapter_users">
            @includeIf('admin.jciChapters.relationships.jciChapterUsers', ['users' => $jciChapter->jciChapterUsers])
        </div>
    </div>
</div>

@endsection