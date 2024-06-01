@extends('layouts.admin')
@section('content')
@can('datachef_create')
    <div style="margin-bottom: 10px;" class="row">
        <div class="col-lg-12">
            <a class="btn btn-success" href="{{ route('admin.datachefs.create') }}">
                {{ trans('global.add') }} {{ trans('cruds.datachef.title_singular') }}
            </a>
        </div>
    </div>
@endcan
<div class="card">
    <div class="card-header">
        {{ trans('cruds.datachef.title_singular') }} {{ trans('global.list') }}
    </div>

    <div class="card-body">
        <div class="table-responsive">
            <table class=" table table-bordered table-striped table-hover datatable datatable-datachef">
                <thead>
                    <tr>
                        <th width="10">

                        </th>
                        <th>
                            {{ trans('cruds.datachef.fields.id') }}
                        </th>
                        <th>
                            {{ trans('cruds.datachef.fields.nama') }}
                        </th>
                        <th>
                            {{ trans('cruds.datachef.fields.position') }}
                        </th>
                        {{-- <th>
                            {{ trans('cruds.datachef.fields.icon') }}
                        </th>
                        <th>
                            {{ trans('cruds.datachef.fields.url') }}
                        </th> --}}
                        <th>
                            {{ trans('cruds.datachef.fields.image') }}
                        </th>
                        <th>
                            &nbsp;
                        </th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($datachef as $key => $d)
                        <tr data-entry-id="{{ $d->id }}">
                            <td>

                            </td>
                            <td>
                                {{ $d->id ?? '' }}
                            </td>
                            <td>
                                {{ $d->nama ?? '' }}
                            </td>
                            <td>
                                {{ $d->position ?? '' }}
                            </td>
                            {{-- <td>
                                {{ $d->icon ?? '' }}
                            </td>
                            <td>
                                {{ $d->url ?? '' }}
                            </td> --}}
                            <td>
                                @if($d->image)
                                    <a href="{{ $d->image->getUrl() }}" target="_blank" style="display: inline-block">
                                        <img src="{{ $d->image->getUrl('thumb') }}">
                                    </a>
                                @endif
                            </td>
                            <td>
                                @can('datachef_show')
                                    <a class="btn btn-xs btn-primary" href="{{ route('admin.datachefs.show', $d->id) }}">
                                        {{ trans('global.view') }}
                                    </a>
                                @endcan

                                @can('datachef_edit')
                                    <a class="btn btn-xs btn-info" href="{{ route('admin.datachefs.edit', $d->id) }}">
                                        {{ trans('global.edit') }}
                                    </a>
                                @endcan

                                @can('datachef_delete')
                                    <form action="{{ route('admin.datachefs.destroy', $d->id) }}" method="POST" onsubmit="return confirm('{{ trans('global.areYouSure') }}');" style="display: inline-block;">
                                        <input type="hidden" name="_method" value="DELETE">
                                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                        <input type="submit" class="btn btn-xs btn-danger" value="{{ trans('global.delete') }}">
                                    </form>
                                @endcan

                            </td>

                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
</div>



@endsection
@section('scripts')
@parent
<script>
    $(function () {
  let dtButtons = $.extend(true, [], $.fn.dataTable.defaults.buttons)
@can('datachef_delete')
  let deleteButtonTrans = '{{ trans('global.datatables.delete') }}'
  let deleteButton = {
    text: deleteButtonTrans,
    url: "{{ route('admin.datachefs.massDestroy') }}",
    className: 'btn-danger',
    action: function (e, dt, node, config) {
      var ids = $.map(dt.rows({ selected: true }).nodes(), function (entry) {
          return $(entry).data('entry-id')
      });

      if (ids.length === 0) {
        alert('{{ trans('global.datatables.zero_selected') }}')

        return
      }

      if (confirm('{{ trans('global.areYouSure') }}')) {
        $.ajax({
          headers: {'x-csrf-token': _token},
          method: 'POST',
          url: config.url,
          data: { ids: ids, _method: 'DELETE' }})
          .done(function () { location.reload() })
      }
    }
  }
  dtButtons.push(deleteButton)
@endcan

  $.extend(true, $.fn.dataTable.defaults, {
    orderCellsTop: true,
    order: [[ 1, 'desc' ]],
    pageLength: 100,
  });
  let table = $('.datatable-datachef:not(.ajaxTable)').DataTable({ buttons: dtButtons })
  $('a[data-toggle="tab"]').on('shown.bs.tab click', function(e){
      $($.fn.dataTable.tables(true)).DataTable()
          .columns.adjust();
  });
  
})

</script>
@endsection