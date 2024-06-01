@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.show') }} {{ trans('cruds.whys.title') }}
    </div>

    <div class="card-body">
        <div class="form-group">
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.whys.index') }}">
                    {{ trans('globalwhyso_list') }}
                </a>
            </div>
            <table class="table table-bordered table-striped">
                <tbody>
                    <tr>
                        <th>
                            {{ trans('cruds.whys.fields.id') }}
                        </th>
                        <td>
                            {{ $why->id }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.whys.fields.title_1') }}
                        </th>
                        <td>
                            {{ $why->title_1 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.whys.fields.title_2') }}
                        </th>
                        <td>
                            {{ $why->title_2 }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.whys.fields.nomor_box') }}
                        </th>
                        <td>
                            {{ $why->nomor_box }}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.whys.fields.description_box_1') }}
                        </th>
                        <td>
                            {!! $why->description_box_1 !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.whys.fields.description_box_2') }}
                        </th>
                        <td>
                            {!! $why->description_box_2 !!}
                        </td>
                    </tr>
                    <tr>
                        <th>
                            {{ trans('cruds.whys.fields.image') }}
                        </th>
                        <td>
                            @if($why->image)
                                <a href="{{ $why->image->getUrl() }}" target="_blank" style="display: inline-block">
                                    <img src="{{ $why->image->getUrl('thumb') }}">
                                </a>
                            @endif
                        </td>
                    </tr>
                </tbody>
            </table>
            <div class="form-group">
                <a class="btn btn-default" href="{{ route('admin.whys.index') }}">
                    {{ trans('global.back_to_list') }}
                </a>
            </div>
        </div>
    </div>
</div>



@endsection