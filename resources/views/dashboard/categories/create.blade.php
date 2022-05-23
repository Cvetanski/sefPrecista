@extends('adminlte::page')
@section('css')
{{--    @include('dashboard.every_page_css')--}}
@endsection
@section('title', 'Креирај Категорија')
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
                        <h3 class="card-title">Додади Нова Категорија</h3>
                    </div>
                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}" id="msg_alert">{{ Session::get('message') }}</p>
                    @endif
                    <form action="{{ route('categories.store') }}" method="POST" enctype="multipart/form-data" novalidate>
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

{{--                            <div class="form-group">--}}
{{--                                <label for="slug">Назнака</label>--}}
{{--                                <input type="text" class="form-control" id="slug" name="slug" placeholder="Внеси Назнака" value="{!! old('slug') !!}" required>--}}
{{--                                @if ($errors->has('slug'))--}}
{{--                                    <span class="help-block error">--}}
{{--                            <strong>{{ $errors->first('slug') }}</strong>--}}
{{--                        </span>--}}
{{--                                @endif--}}
{{--                            </div>--}}

                            <div class="form-group">
                                <label for="section">Одбери Секција</label>
                                <select name="section_id" id="section_id" class="form-control">
                                    <option disabled selected>Одбери Секција</option>
                                    @foreach($sections as $section)
                                        <option value="{{ $section->id }}"{{ old('section') == $section->id ? 'selected' : '' }}>{{ ucfirst($section->title) }}</option>
                                    @endforeach
                                </select>
                                @error('company')
                                {{$message}}
                                @enderror
                            </div>

                            <div class="form-group">
                                <label for="text">Краток опис</label>
                                <textarea type="text" class="form-control text" id="description" name="description" rows="10" placeholder="Внеси Опис" required>{!! old('description') !!}</textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block error">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                                @endif
                            </div>
                </div>
                        <div class="card-footer">
                            <div class="float-right">
                                <button type="submit" name="button_publish" class="btn btn-success mr-3">Зачувај</button>
                                {{-- <button type="submit" name="button_preview" class="btn btn-primary mr-3">Preview</button> --}}

                                {{--                                <a href="{{ route('blog.blog-posts.list') }}" class="btn btn-secondary float-right mr-3">Cancel</a>--}}
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
{{--@section('js')--}}
{{--    @include('dashboard.every_page_script')--}}


{{--    <script type="text/javascript">--}}
{{--        $('.input-images-1').imageUploader();--}}
{{--    </script>--}}

{{--    <script>--}}

{{--        $(function() {--}}
{{--            $('input[name="created_at"]').daterangepicker({--}}
{{--                singleDatePicker: true,--}}
{{--                showDropdowns: true,--}}
{{--                minYear: 2000,--}}
{{--                maxYear: 2035--}}
{{--            }, function(start, end, label) {--}}

{{--            });--}}
{{--        });--}}
{{--    </script>--}}

{{--@stop--}}
