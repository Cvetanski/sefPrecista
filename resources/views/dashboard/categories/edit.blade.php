@extends('adminlte::page')
@section('css')
{{--    @include('dashboard.every_page_css')--}}
@endsection
@section('title', 'Изменете ја категоријата')
@section('content_header')

@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Изменете ја категоријата</h3>
                    </div>
                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}" id="msg_alert">{{ Session::get('message') }}</p>
                    @endif
                    <form method="POST" action="{{route('categories.update', ['id' => $categories->id])}}">
                        @csrf
                        <div class="card-body">
                            <input type="hidden" name="is_edit" id="is_edit" value="1">
                            <input type="hidden" name="post_id" id="post_id" value="{{ $categories->id }}">

                            <div class="form-group">
                                <label for="text">Име на категоријата</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Име" value="{!! $categories->title !!}  {!! old('title') !!}" required>
                                @if ($errors->has('title'))
                                    <span class="help-block error">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                                @endif
                            </div>

{{--                            <div class="form-group">--}}
{{--                                <label for="text">Назнака</label>--}}
{{--                                <input type="text" class="form-control" id="slug" name="slug" placeholder="Назнака" value="{!! $categories->slug !!}  {!! old('slug') !!}" required>--}}
{{--                                @if ($errors->has('slug'))--}}
{{--                                    <span class="help-block error">--}}
{{--                            <strong>{{ $errors->first('slug') }}</strong>--}}
{{--                        </span>--}}
{{--                                @endif--}}
{{--                            </div>--}}

                            <div class="form-group">
                                <strong>Одбери Секција</strong>
                                <select name="section_id" class="form-control custom-select">
                                    @foreach($sections as $section)
                                        <option value="{{ $section->id }}" @if(old('section') == $section->id || $section->id == $categories->section->id) selected @endif>{{ $section->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            <div class="form-group">
                                <label for="text">Опис на категоријата</label>
                                <input type="text" class="form-control" id="description" name="description" placeholder="Опис на категоријата" value="{!! $categories->description !!}  {!! old('description') !!}" required>
                                @if ($errors->has('description'))
                                    <span class="help-block error">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                                @endif
                            </div>


                            <div class="form-group">
                                <label for="date">Изменето во</label>
                                <input type="text" name="created_at" class="date form-control" readonly required="" value="@if($categories->created_at){{\Carbon\Carbon::parse($categories->created_at)->format('m/d/y')}} @else{!! old('created_at') !!}@endif" />
                            </div>
                        </div>

                        <div class="card-footer">
                            {{--                            <div class="float-right">--}}
                            <button type="submit" class="btn btn-primary mr-3">Измени</button>
                            {{--                                <a href="{{ route('faq.index') }}"--}}
                            {{--                                   class="btn btn-default float-right mr-3">Cancel</a>--}}
                            {{--                            </div>--}}
                        </div>
                    </form>

                </div>
                {{--                <!-- /.box -->--}}
            </div>
            <!-- /.col -->
        </div>
    </div>
@stop
{{--@section('js')--}}
{{--    @include('dashboard.every_page_scripts')--}}

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
