<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\MassDestroyListingRequest;
use App\Http\Requests\StoreListingRequest;
use App\Http\Requests\UpdateListingRequest;
use App\Models\Listing;
use App\Models\Tag;
use Gate;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class ListingsController extends Controller
{
    public function index()
    {
        abort_if(Gate::denies('listing_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $listings = Listing::with(['tags'])->get();

        return view('admin.listings.index', compact('listings'));
    }

    public function create()
    {
        abort_if(Gate::denies('listing_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tags = Tag::pluck('name', 'id');

        return view('admin.listings.create', compact('tags'));
    }

    public function store(StoreListingRequest $request)
    {
        $listing = Listing::create($request->all());
        $listing->tags()->sync($request->input('tags', []));

        return redirect()->route('admin.listings.index');
    }

    public function edit(Listing $listing)
    {
        abort_if(Gate::denies('listing_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $tags = Tag::pluck('name', 'id');

        $listing->load('tags');

        return view('admin.listings.edit', compact('tags', 'listing'));
    }

    public function update(UpdateListingRequest $request, Listing $listing)
    {
        $listing->update($request->all());
        $listing->tags()->sync($request->input('tags', []));

        return redirect()->route('admin.listings.index');
    }

    public function show(Listing $listing)
    {
        abort_if(Gate::denies('listing_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $listing->load('tags');

        return view('admin.listings.show', compact('listing'));
    }

    public function destroy(Listing $listing)
    {
        abort_if(Gate::denies('listing_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $listing->delete();

        return back();
    }

    public function massDestroy(MassDestroyListingRequest $request)
    {
        Listing::whereIn('id', request('ids'))->delete();

        return response(null, Response::HTTP_NO_CONTENT);
    }
}
