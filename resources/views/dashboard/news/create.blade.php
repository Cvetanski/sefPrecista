@extends('adminlte::page')
@section('css')
    {{--    @include('dashboard.every_page_css')--}}
@endsection
@section('title', 'Креирај Новост')
@section('content_header')

@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        @if(Session::has('error'))
                            <p class="alert {{ Session::get('alert-class', 'alert-warning') }}" id="msg_alert">{{ Session::get('error') }}</p>
                        @endif
                        <h3 class="card-title">Додади Новост</h3>
                    </div>
                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}" id="msg_alert">{{ Session::get('message') }}</p>
                    @endif
                    <form action="{{ route('news.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Наслов</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Внеси Наслов" value="{!! old('title') !!}" required>
                                @if ($errors->has('title'))
                                    <span class="help-block error">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="text">Краток Опис</label>
                                <textarea type="text" class="form-control"  name="short_description" rows="10" placeholder="Внеси Опис" required>{!! old('short_description') !!}</textarea>
                                @if ($errors->has('short_description'))
                                    <span class="help-block error">
                            <strong>{{ $errors->first('short_description') }}</strong>
                        </span>
                                @endif
                            </div>


                            <div class="form-group">
                                <label for="text">Опис</label>
                                <textarea type="text" class="form-control" id="summary-ckeditor"  name="description" rows="10" placeholder="Внеси Опис" required>{!! old('description') !!}</textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block error">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                                @endif
                            </div>


                            <div class="form-group">
                                <label for="slug">Назнака</label>
                                <input type="text" class="form-control" id="slug" name="slug" placeholder="Внеси Назнака" value="{!! old('slug') !!}" required>
                                @if ($errors->has('slug'))
                                    <span class="help-block error">
                            <strong>{{ $errors->first('slug') }}</strong>
                        </span>
                                @endif
                            </div>


{{--                            <div class="form-group">--}}
{{--                                <input type="file" name="image2[]" multiple="multiple">--}}
{{--                            </div>--}}

                            <div class="form-group">
                                <label for="file">Внеси слика</label>
                                <input type="file" class="form-control-file" id="image" name="image" placeholder="Внеси Слика" value="{!! old('image2') !!}" required>
                                @if ($errors->has('image2'))
                                    <span class="help-block error">
                            <strong>{{ $errors->first('image2') }}</strong>
                        </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="file">Внеси Кавер слика</label>
                                <input type="file" class="form-control-file" id="cover_image" name="cover_image" placeholder="Внеси Кавер Слика" value="{!! old('cover_image') !!}" required>
                                @if ($errors->has('cover_image'))
                                    <span class="help-block error">
                            <strong>{{ $errors->first('cover_image') }}</strong>
                        </span>
                                @endif
                            </div>

                        </div>
                        <div class="card-footer">
                            <div class="float-right">
                                <button type="submit" name="button_publish" class="btn btn-success mr-3">Зачувај</button>
                            </div>
                        </div>
                    </form>
                </div>
                <!-- /.box -->
            </div>
            <!-- /.col -->
        </div>
    </div>
@stop


@section('js')
    <script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
    <script>
        CKEDITOR.replace( 'summary-ckeditor', {
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@stop
