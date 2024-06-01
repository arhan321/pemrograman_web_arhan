<?php

namespace App\Http\Controllers\Admin;

use Gate;
use App\Models\Why;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreWhyRequest;
use App\Http\Requests\UpdateWhyRequest;
use App\Http\Requests\MassDestroyWhyRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class Whycontroller extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('why_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $why = Why::with(['media'])->get();

        return view('admin.whys.index', compact('why'));
    }

    public function create()
    {
        abort_if(Gate::denies('why_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.whys.create');
    }

    public function store(StoreWhyRequest $request)
    {
        $why = Why::create($request->all());

        if ($request->input('image', false)) {
            $why->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $why->id]);
        }

        return redirect()->route('admin.whys.index');
    }

    public function edit(Why $why)
    {
        abort_if(Gate::denies('why_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.whys.edit', compact('why'));
    }

    public function update(UpdateWhyRequest $request, Why $why)
    {
        $why->update($request->all());

        if ($request->input('image', false)) {
            if (! $why->image || $request->input('image') !== $why->image->file_name) {
                if ($why->image) {
                    $why->image->delete();
                }
                $why->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($why->image) {
            $why->image->delete();
        }

        return redirect()->route('admin.whys.index');
    }

    public function show(Why $why)
    {
        abort_if(Gate::denies('why_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.whys.show', compact('why'));
    }

    public function destroy(Why $why)
    {
        abort_if(Gate::denies('why_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $why->delete();

        return back();
    }

    public function massDestroy(MassDestroyWhyRequest $request)
    {
        $why = Why::find(request('ids'));

        foreach ($why as $why) {
            $why->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('why_create') && Gate::denies('why_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Why();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
