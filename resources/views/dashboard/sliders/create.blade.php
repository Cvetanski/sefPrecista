@extends('adminlte::page')
@section('css')
    {{--    @include('dashboard.every_page_css')--}}
@endsection
@section('title', 'Додади Слајдер')
@section('content_header')

@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}" id="msg_alert">{{ Session::get('message') }}</p>
                    @endif
                    <div class="card-header">
                        @if(Session::has('error'))
                            <p class="alert {{ Session::get('alert-class', 'alert-warning') }}" id="msg_alert">{{ Session::get('error') }}</p>
                        @endif
                        <h3 class="card-title">Додади Нова Слајдер</h3>
                    </div>
                    <form action="{{ route('slider.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                        {{ csrf_field() }}


                        <div class="card-body">

                            <div class="form-group">
                                <label for="title">Име на слајдерот</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Внеси Наслов" value="{!! old('title') !!}" required>
                                @if ($errors->has('title'))
                                    <span class="help-block error">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="file">Внеси слика или видео</label>
                                <input type="file" class="form-control-file" id="photo" name="photo" placeholder="Внеси Слика или Видео" value="{!! old('photo') !!}" required>
                                @if ($errors->has('photo'))
                                    <span class="help-block error">
                            <strong>{{ $errors->first('photo') }}</strong>
                        </span>
                                @endif
                            </div>

{{--                        <div class="card-footer">--}}
                            <div class="float-left">
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
