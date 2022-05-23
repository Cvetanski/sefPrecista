@extends('adminlte::page')
@section('css')
    {{--    @include('dashboard.every_page_css')--}}
@endsection
@section('title', 'Креирај Поткатегорија')
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
                        <h3 class="card-title">Додади Нова Поткатегорија</h3>
                    </div>
                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}" id="msg_alert">{{ Session::get('message') }}</p>
                    @endif
                    <form action="{{ route('subcategories.store') }}" method="POST" enctype="multipart/form-data" novalidate>
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
                                <label for="slug">Назнака</label>
                                <input type="text" class="form-control" id="slug" name="slug" placeholder="Внеси Назнака" value="{!! old('slug') !!}" required>
                                @if ($errors->has('slug'))
                                    <span class="help-block error">
                            <strong>{{ $errors->first('slug') }}</strong>
                        </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="text">Краток опис</label>
                                <textarea type="text" class="form-control" id="summary-ckeditor"  name="description" rows="10" placeholder="Внеси Опис" required>{!! old('description') !!}</textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block error">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                                @endif
                            </div>

                            <div>
                                <label for="category">Одбери Категорија *</label>
                                <select id="category" class="form-control" name="category_id" >
                                    <option value="" disabled selected>Одбери Категорија</option>
                                    @php
                                        $category = \App\Models\Categories::all();
                                    @endphp
                                    @foreach ($category as $cat )
                                        <option @if(old('category_id') == $cat->id) selected @endif value="{{$cat->id}}">{{$cat->title}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category_id'))
                                    <span class="help-block error text-danger">
                              <strong>{{ $errors->first('category_id') }}</strong>
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

@stop
