<?php

namespace App\Http\Controllers\Admin;

use Gate;
use App\Models\Footer;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFooterRequest;
use App\Http\Requests\UpdateFooterRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\MassDestroyFooterRequest;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class FooterController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('footer_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $footers = Footer::with(['media'])->get();

        return view('admin.footers.index', compact('footers'));
    }

    public function create()
    {
        abort_if(Gate::denies('footer_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.footers.create');
    }

    public function store(StoreFooterRequest $request)
    {
        $footer = Footer::create($request->all());

        return redirect()->route('admin.footers.index');
    }

    public function edit(Footer $footer)
    {
        abort_if(Gate::denies('footer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.footers.edit', compact('footer'));
    }

    public function update(UpdateFooterRequest $request, Footer $footer)
    {
        $footer->update($request->all());

        return redirect()->route('admin.footers.index');
    }

    public function show(Footer $footer)
    {
        abort_if(Gate::denies('footer_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.footers.show', compact('footer'));
    }

    public function destroy(Footer $footer)
    {
        abort_if(Gate::denies('footer_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $footer->delete();

        return back();
    }

    public function massDestroy(MassDestroyFooterRequest $request)
    {
        $footers = Footer::find(request('ids'));

        foreach ($footers as $footer) {
            $footer->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('footer_create') && Gate::denies('footer_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Footer();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
