@extends('layouts.admin')
@section('content')

<div class="card">
    <div class="card-header">
        {{ trans('global.create') }} {{ trans('cruds.whys.title_singular') }}
    </div>

    <div class="card-body">
        <form method="POST" action="{{ route("admin.whys.store") }}" enctype="multipart/form-data">
            @csrf
            <div class="form-group">
                <label class="required" for="title_1">{{ trans('cruds.whys.fields.title_1') }}</label>
                <input class="form-control {{ $errors->has('title_1') ? 'is-invalid' : '' }}" type="text" name="title_1" id="title_1" value="{{ old('title_1', '') }}">
                @if($errors->has('title_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('title_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.whys.fields.title_helper') }}</span>
            </div>
            <div class="form-group">
              <label class="required" for="title_2">{{ trans('cruds.whys.fields.title_2') }}</label>
              <input class="form-control {{ $errors->has('title_2') ? 'is-invalid' : '' }}" type="text" name="title_2" id="title_2" value="{{ old('title_2', '') }}">
              @if($errors->has('title_2'))
                  <div class="invalid-feedback">
                      {{ $errors->first('title_2') }}
                  </div>
              @endif
              <span class="help-block">{{ trans('cruds.whys.fields.title_helper') }}</span>
          </div>
          <div class="form-group">
            <label class="required" for="nomor_box">{{ trans('cruds.whys.fields.nomor_box') }}</label>
            <input class="form-control {{ $errors->has('nomor_box') ? 'is-invalid' : '' }}" type="number" name="nomor_box" id="nomor_box" value="{{ old('nomor_box', '') }}" min="0" step="1">
            @if($errors->has('nomor_box'))
                <div class="invalid-feedback">
                    {{ $errors->first('nomor_box') }}
                </div>
            @endif
            <span class="help-block">{{ trans('cruds.whys.fields.title_helper') }}</span>
        </div>        
            <div class="form-group">
                <label for="description_box_1">{{ trans('cruds.whys.fields.description_box_1') }}</label>
                <textarea class="form-control ckeditor {{ $errors->has('description_box_1') ? 'is-invalid' : '' }}" name="description_box_1" id="description_box_1">{!! old('description_box_1') !!}</textarea>
                @if($errors->has('description_box_1'))
                    <div class="invalid-feedback">
                        {{ $errors->first('description_box_1') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.whys.fields.description_box_1_helper') }}</span>
            </div>
            <div class="form-group">
              <label for="description_box_2">{{ trans('cruds.whys.fields.description_box_2') }}</label>
              <textarea class="form-control ckeditor {{ $errors->has('description_box_2') ? 'is-invalid' : '' }}" name="description_box_2" id="description_box_2">{!! old('description_box_2') !!}</textarea>
              @if($errors->has('description_box_2'))
                  <div class="invalid-feedback">
                      {{ $errors->first('description_box_2') }}
                  </div>
              @endif
              <span class="help-block">{{ trans('cruds.whys.fields.description_box_2_helper') }}</span>
          </div>
            {{-- <div class="form-group">
                <label class="required" for="image">{{ trans('cruds.whys.fields.image') }}</label>
                <div class="needsclick dropzone {{ $errors->has('image') ? 'is-invalid' : '' }}" id="image-dropzone">
                </div>
                @if($errors->has('image'))
                    <div class="invalid-feedback">
                        {{ $errors->first('image') }}
                    </div>
                @endif
                <span class="help-block">{{ trans('cruds.whys.fields.image_helper') }}</span>
            </div> --}}
            <div class="form-group">
                <button class="btn btn-danger" type="submit">
                    {{ trans('global.save') }}
                </button>
            </div>
          </div>
        </form>
    </div>
</div>



@endsection

@section('scripts')
<script>
    $(document).ready(function () {
  function SimpleUploadAdapter(editor) {
    editor.plugins.get('FileRepository').createUploadAdapter = function(loader) {
      return {
        upload: function() {
          return loader.file
            .then(function (file) {
              return new Promise(function(resolve, reject) {
                // Init request
                var xhr = new XMLHttpRequest();
                xhr.open('POST', '{{ route('admin.whys.storeCKEditorImages') }}', true);
                xhr.setRequestHeader('x-csrf-token', window._token);
                xhr.setRequestHeader('Accept', 'application/json');
                xhr.responseType = 'json';

                // Init listeners
                var genericErrorText = `Couldn't upload file: ${ file.name }.`;
                xhr.addEventListener('error', function() { reject(genericErrorText) });
                xhr.addEventListener('abort', function() { reject() });
                xhr.addEventListener('load', function() {
                  var response = xhr.response;

                  if (!response || xhr.status !== 201) {
                    return reject(response && response.message ? `${genericErrorText}\n${xhr.status} ${response.message}` : `${genericErrorText}\n ${xhr.status} ${xhr.statusText}`);
                  }

                  $('form').append('<input type="hidden" name="ck-media[]" value="' + response.id + '">');

                  resolve({ default: response.url });
                });

                if (xhr.upload) {
                  xhr.upload.addEventListener('progress', function(e) {
                    if (e.lengthComputable) {
                      loader.uploadTotal = e.total;
                      loader.uploaded = e.loaded;
                    }
                  });
                }

                // Send request
                var data = new FormData();
                data.append('upload', file);
                data.append('crud_id', '{{ $why->id ?? 0 }}');
                xhr.send(data);
              });
            })
        }
      };
    }
  }

  var allEditors = document.querySelectorAll('.ckeditor');
  for (var i = 0; i < allEditors.length; ++i) {
    ClassicEditor.create(
      allEditors[i], {
        extraPlugins: [SimpleUploadAdapter]
      }
    );
  }
});
</script>
{{-- 
<script>
    Dropzone.options.imageDropzone = {
    url: '{{ route('admin.whys.storeMedia') }}',
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
      $('form').find('input[name="image"]').remove()
      $('form').append('<input type="hidden" name="image" value="' + response.name + '">')
    },
    removedfile: function (file) {
      file.previewElement.remove()
      if (file.status !== 'error') {
        $('form').find('input[name="image"]').remove()
        this.options.maxFiles = this.options.maxFiles + 1
      }
    },
    init: function () {
@if(isset($why) && $why->image)
      var file = {!! json_encode($why->image) !!}
          this.options.addedfile.call(this, file)
      this.options.thumbnail.call(this, file, file.preview ?? file.preview_url)
      file.previewElement.classList.add('dz-complete')
      $('form').append('<input type="hidden" name="image" value="' + file.file_name + '">')
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