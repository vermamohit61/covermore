@extends('layouts.admin')
@section('content')
<div class="content">

    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    {{ trans('global.create') }} {{ trans('cruds.createQuestion.title') }}
                </div>
                <div class="panel-body">
                    <form method="POST" action="{{ route("admin.questionair.store") }}" enctype="multipart/form-data">
                        @csrf
                        
                        <fieldset>
                        <div class="form-group {{ $errors->has('ques_1') ? 'has-error' : '' }}">
                            <label class="required" for="ques_1">{{ trans('cruds.createQuestion.fields.question_title') }} 1</label>
                            <input class="form-control" type="text" name="ques[]" id="ques_1" value="{{ old('ques_1', '') }}" required>
                            @if($errors->has('ques_1'))
                                <span class="help-block" role="alert">{{ $errors->first('first_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.createQuestion.fields.question_title_helper') }}</span>
                            
                        </div>
                        <div class="form-group {{ $errors->has('ans_ques_1') ? 'has-error' : '' }}">
                            <label class="required" for="required">{{ trans('cruds.createQuestion.fields.answer') }} 1</label>
                            <input class="form-control" type="text" name="ansone[]" id="ans_ques_1" required value="{{ old('last_name', '') }}">
                          
                        </div>
                        <div class="form-group>
                            <label class="required" for="required">{{ trans('cruds.createQuestion.fields.answer') }} 2</label>
                            <input class="form-control" type="text" name="anstwo[]" id="ans_2_ques_1" value="{{ old('mobile', '') }}">
                           
                        </div>
                        <div class="form-group>
                            <label class="required" for="required">{{ trans('cruds.createQuestion.fields.answer') }} 3</label>
                            <input class="form-control" type="text" name="ansthree[]" id="ans_3_ques_1" value="{{ old('email') }}">
                           
                        </div>
                            
                        <div class="form-group>
                            <label class="required" for="required">{{ trans('cruds.createQuestion.fields.answer') }} 4</label>
                            <input class="form-control" type="text" name="ansfour[]" id="ans_3_ques_1" value="{{ old('email') }}">
                            
                        </div>   
                            
                         
                            
                        </fieldset>
                        <div>&nbsp;</div>
                        <fieldset class="form-group">
                        <div class="form-group {{ $errors->has('ques_1') ? 'has-error' : '' }}">
                            <label class="required" for="ques_1">{{ trans('cruds.createQuestion.fields.question_title') }} 2</label>
                            <input class="form-control" type="text" name="ques[]" id="ques_1" value="{{ old('ques_1', '') }}" required>
                            @if($errors->has('ques_1'))
                                <span class="help-block" role="alert">{{ $errors->first('first_name') }}</span>
                            @endif
                            <span class="help-block">{{ trans('cruds.createQuestion.fields.question_title_helper') }}</span>
                            
                        </div>
                        <div class="form-group {{ $errors->has('ans_ques_1') ? 'has-error' : '' }}">
                            <label class="required" for="required">{{ trans('cruds.createQuestion.fields.answer') }} 1</label>
                            <input class="form-control" type="text" name="ansone[]" id="ans_ques_1" required value="{{ old('last_name', '') }}">
                          
                        </div>
                        <div class="form-group>
                            <label class="required" for="required">{{ trans('cruds.createQuestion.fields.answer') }} 2</label>
                            <input class="form-control" type="text" name="anstwo[]" id="ans_2_ques_1" value="{{ old('mobile', '') }}">
                           
                        </div>
                        <div class="form-group>
                            <label class="required" for="required">{{ trans('cruds.createQuestion.fields.answer') }} 3</label>
                            <input class="form-control" type="text" name="ansthree[]" id="ans_3_ques_1" value="{{ old('email') }}">
                                                    </div>
                            
                        <div class="form-group>
                            <label class="required" for="required">{{ trans('cruds.createQuestion.fields.answer') }} 4</label>
                            <input class="form-control" type="text" name="ansfour[]" id="ans_3_ques_1" value="{{ old('email') }}">
                            
                        </div>   
                            
                         
                            
                        </fieldset>

                      
                        <div class="form-group">
                            <button class="btn btn-danger" type="submit">
                                {{ trans('global.save') }}
                            </button>
                        </div>
                    </form>
                </div>
            </div>



        </div>
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
                xhr.open('POST', '/admin/leads/ckmedia', true);
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
                data.append('crud_id', {{ $lead->id ?? 0 }});
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

@endsection