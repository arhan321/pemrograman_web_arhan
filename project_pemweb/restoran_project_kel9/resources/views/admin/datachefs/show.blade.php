@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.datachef.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.datachef.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.datachef.fields.id') }}
                        </th>
                        <td>
                            {{ $datachef->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.datachef.fields.title') }}
                        </th>
                        <td>
                            {{ $datachef->title }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.datachef.fields.image') }}
                        </th>
                        <td>
                            @if($datachef->image)
                                <a href="{{ $datachef->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $datachef->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.datachefs.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection