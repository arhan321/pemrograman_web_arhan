@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.edit') }} {{ trans('cruds.footer.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.footers.update", [$footer->id]) }}" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <div class="form-group">
                <label for="logo_restoran">{{ trans('cruds.footer.fields.logo') }}</label>
                <input class="form-control {{ $errors->has('logo_restoran') ? 'is-invalid' : '' }}" type="text" name="logo_restoran" id="logo_restoran" value="{{ old('logo_restoran', $footer->logo_restoran) }}">
                @if($errors->has('logo_restoran'))
                    <div class="invalid-feedback">
                        {{ $errors->first('logo_restoran') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.footer.fields.logo_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="detail">{{ trans('cruds.footer.fields.detail') }}</label>
                <input class="form-control {{ $errors->has('detail') ? 'is-invalid' : '' }}" type="text" name="detail" id="detail" value="{{ old('detail', $footer->detail) }}">
                @if($errors->has('detail'))
                    <div class="invalid-feedback">
                        {{ $errors->first('detail') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.footer.fields.detail_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="alamat">{{ trans('cruds.footer.fields.alamat') }}</label>
                <textarea class="form-control {{ $errors->has('alamat') ? 'is-invalid' : '' }}" name="alamat" id="alamat">{{ old('alamat', $footer->alamat) }}</textarea>
                @if($errors->has('alamat'))
                    <div class="invalid-feedback">
                        {{ $errors->first('alamat') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.footer.fields.alamat_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="phone">{{ trans('cruds.footer.fields.phone') }}</label>
                <input class="form-control {{ $errors->has('phone') ? 'is-invalid' : '' }}" type="text" name="phone" id="phone" value="{{ old('phone', $footer->phone) }}">
                @if($errors->has('phone'))
                    <div class="invalid-feedback">
                        {{ $errors->first('phone') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.footer.fields.phone_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="faximile">{{ trans('cruds.footer.fields.faximile') }}</label>
                <input class="form-control {{ $errors->has('faximile') ? 'is-invalid' : '' }}" type="text" name="faximile" id="faximile" value="{{ old('faximile', $footer->faximile) }}">
                @if($errors->has('faximile'))
                    <div class="invalid-feedback">
                        {{ $errors->first('faximile') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.footer.fields.faximile_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="faximile">{{ trans('cruds.footer.fields.faximile') }}</label>
                <input class="form-control {{ $errors->has('faximile') ? 'is-invalid' : '' }}" type="text" name="faximile" id="faximile" value="{{ old('faximile', $footer->faximile) }}">
                @if($errors->has('faximile'))
                    <div class="invalid-feedback">
                        {{ $errors->first('faximile') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.footer.fields.faximile_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="opening_day">{{ trans('cruds.footer.fields.opening_day') }}</label>
                <input class="form-control {{ $errors->has('opening_day') ? 'is-invalid' : '' }}" type="text" name="opening_day" id="opening_day" value="{{ old('opening_day', $footer->opening_day) }}">
                @if($errors->has('opening_day'))
                    <div class="invalid-feedback">
                        {{ $errors->first('opening_day') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.footer.fields.opening_day_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="opening_hours">{{ trans('cruds.footer.fields.opening_hours') }}</label>
                <input class="form-control {{ $errors->has('opening_hours') ? 'is-invalid' : '' }}" type="time" name="opening_hours" id="opening_hours" value="{{ old('opening_hours', $footer->opening_hours) }}">
                @if($errors->has('opening_hours'))
                    <div class="invalid-feedback">
                        {{ $errors->first('opening_hours') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.footer.fields.opening_hours_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="closing_hours">{{ trans('cruds.footer.fields.closing_hours') }}</label>
                <input class="form-control {{ $errors->has('closing_hours') ? 'is-invalid' : '' }}" type="time" name="closing_hours" id="closing_hours" value="{{ old('closing_hours', $footer->closing_hours) }}">
                @if($errors->has('closing_hours'))
                    <div class="invalid-feedback">
                        {{ $errors->first('closing_hours') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.footer.fields.closing_hours_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="copyright">{{ trans('cruds.footer.fields.copyright') }}</label>
                <input class="form-control {{ $errors->has('copyright') ? 'is-invalid' : '' }}" type="text" name="copyright" id="copyright" value="{{ old('copyright', $footer->copyright) }}">
                @if($errors->has('copyright'))
                    <div class="invalid-feedback">
                        {{ $errors->first('copyright') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.footer.fields.copyright_helper') }}</span>
            </div>
            <div class="form-group">
                <label for="desain_by">{{ trans('cruds.footer.fields.desain_by') }}</label>
                <input class="form-control {{ $errors->has('desain_by') ? 'is-invalid' : '' }}" type="text" name="desain_by" id="desain_by" value="{{ old('desain_by', $footer->desain_by) }}">
                @if($errors->has('desain_by'))
                    <div class="invalid-feedback">
                        {{ $errors->first('desain_by') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.footer.fields.email_helper') }}</span>
            </div>
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
{{-- <script>
    Dropzone.options.logoDropzone = {
    url: '{{ route('admin.footers.storeMedia') }}',
    maxFilesize: 2, // MB
    acceptedFiles: '.jpeg,.jpg,.png,.gif',
    maxFiles: 1,
    addRemoveLinks: true,
    headers: {
      'X-CSRF-TOKEN': "{{ csrf_token() }}"
    },
    params: {
      size: 2,
      width: 4096,
      height: 4096
    },
    success: function (file, response) {
      $('form').find('input[name="logo"]').remove()
      $('form').append('<input type="hidden" name="logo" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="logo"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($footer) && $footer->logo)
      var file = {!! json_encode($footer->logo) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="logo" value="' + file.file_name + '">')
      this.options.maxFiles = this.options.maxFiles - 1
@endif
    },
    error: function (file, response) {
        if ($.type(response) === 'string') {
            var message = response //dropzone sends it's own error messages in string
        } else {
            var message = response.errors.file
        }
        file.previewElement.classList.add('dz-error')
        _ref = file.previewElement.querySelectorAll('[data-dz-errormessage]')
        _results = []
        for (_i = 0, _len = _ref.length; _i < _len; _i++) {
            node = _ref[_i]
            _results.push(node.textContent = message)
        }

        return _results
    }
}

</script> --}}
@endsection