<?php

namespace App\Http\Controllers\Admin;

use Gate;
use App\Models\Datachef;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDatachefRequest;
use App\Http\Requests\UpdateDatachefRequest;
use Symfony\Component\HttpFoundation\Response;
use App\Http\Requests\MassDestroyDatachefRequest;
use App\Http\Controllers\Traits\MediaUploadingTrait;
use Spatie\MediaLibrary\MediaCollections\Models\Media;

class DatacheffController extends Controller
{
    use MediaUploadingTrait;

    public function index()
    {
        abort_if(Gate::denies('datachef_access'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $datachef = Datachef::with(['media'])->get();

        return view('admin.datachefs.index', compact('datachef'));
    }

    public function create()
    {
        abort_if(Gate::denies('datachef_create'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.datachefs.create');
    }

    public function store(StoreDatachefRequest $request)
    {
        $datachef = Datachef::create($request->all());

        if ($request->input('image', false)) {
            $datachef->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
        }

        if ($media = $request->input('ck-media', false)) {
            Media::whereIn('id', $media)->update(['model_id' => $datachef->id]);
        }

        return redirect()->route('admin.datachefs.index');
    }

    public function edit(Datachef $datachef)
    {
        abort_if(Gate::denies('datachef_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.datachefs.edit', compact('datachef'));
    }

    public function update(UpdateDatachefRequest $request, Datachef $datachef)
    {
        $datachef->update($request->all());

        if ($request->input('image', false)) {
            if (! $datachef->image || $request->input('image') !== $datachef->image->file_name) {
                if ($datachef->image) {
                    $datachef->image->delete();
                }
                $datachef->addMedia(storage_path('tmp/uploads/' . basename($request->input('image'))))->toMediaCollection('image');
            }
        } elseif ($datachef->image) {
            $datachef->image->delete();
        }

        return redirect()->route('admin.datachefs.index');
    }

    public function show(Datachef $datachef)
    {
        abort_if(Gate::denies('datachef_show'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        return view('admin.datachefs.show', compact('datachef'));
    }

    public function destroy(Datachef $datachef)
    {
        abort_if(Gate::denies('datachef_delete'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $datachef->delete();

        return back();
    }

    public function massDestroy(MassDestroyDatachefRequest $request)
    {
        $datachef = Datachef::find(request('ids'));

        foreach ($datachef as $datachef) {
            $datachef->delete();
        }

        return response(null, Response::HTTP_NO_CONTENT);
    }

    public function storeCKEditorImages(Request $request)
    {
        abort_if(Gate::denies('datachef_create') && Gate::denies('datachef_edit'), Response::HTTP_FORBIDDEN, '403 Forbidden');

        $model         = new Datachef();
        $model->id     = $request->input('crud_id', 0);
        $model->exists = true;
        $media         = $model->addMediaFromRequest('upload')->toMediaCollection('ck-media');

        return response()->json(['id' => $media->id, 'url' => $media->getUrl()], Response::HTTP_CREATED);
    }
}
