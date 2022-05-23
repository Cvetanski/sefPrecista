@extends('adminlte::page')
@section('css')
    {{--    @include('dashboard.every_page_css')--}}
@endsection
@section('title', 'Креирај Содржина')
@section('content_header')

@stop

@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        @if(Session::has('error'))
                            <p class="alert {{ Session::get('alert-class', 'alert-warning') }}"
                               id="msg_alert">{{ Session::get('error') }}</p>
                        @endif
                        <h3 class="card-title">Додади Нова Содржина</h3>
                    </div>
                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}"
                           id="msg_alert">{{ Session::get('message') }}</p>
                    @endif
                    <form action="{{ route('content.store') }}" method="POST" enctype="multipart/form-data" novalidate>
                        {{ csrf_field() }}
                        <div class="card-body">
                            <div class="form-group">
                                <label for="title">Наслов</label>
                                <input type="text" class="form-control" name="title" rows="10"
                                       placeholder="Внеси Краток Опис" required>{!! old('title') !!}</input>
                                @if ($errors->has('title'))
                                    <span class="help-block error">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="text">Краток опис</label>
                                <textarea type="text" class="form-control" name="short_description" rows="10"
                                          placeholder="Внеси Краток Опис"
                                          required>{!! old('short_description') !!}</textarea>
                                @if ($errors->has('short_description'))
                                    <span class="help-block error">
                            <strong>{{ $errors->first('short_description') }}</strong>
                        </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="text"> Oпис </label>
                                <textarea type="text" class="form-control" id="summary-ckeditor" name="description"
                                          rows="10" placeholder="Внеси Опис"
                                          required>{!! old('description') !!}</textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block error">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="file">Внеси слика</label>
                                <input type="file" class="form-control-file" id="image" name="image"
                                       placeholder="Внеси Слика" value="{!! old('image2') !!}" required>
                                @if ($errors->has('image2'))
                                    <span class="help-block error">
                            <strong>{{ $errors->first('image2') }}</strong>
                        </span>
                                @endif
                            </div>

                            <div>
                                <label for="section">Одбери Секција *</label>
                                <select id="section" class="form-control" name="section_id">
                                    <option value="" disabled selected>Одбери Секција</option>
                                    @php
                                        $sections = \App\Models\Section::all();
                                    @endphp
                                    @foreach ($sections as $section)
                                        <option @if(old('section_id') == $section->id) selected
                                                @endif value="{{$section->id}}">{{$section->title}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('section_id'))
                                    <span class="help-block error text-danger">
                              <strong>{{ $errors->first('section_id') }}</strong>
                              </span>
                                @endif
                            </div>


                            <div>
                                <label for="category">Одбери Категорија *</label>
                                <select id="category" class="form-control" name="category_id">
                                    <option value="" disabled selected>Одбери Категорија</option>
                                    @php
                                        $categories = \App\Models\Category::all();
                                    @endphp
                                    @foreach ($categories as $category)
                                        <option @if(old('category_id') == $category->id) selected
                                                @endif value="{{$category->id}}">{{$category->title}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('category_id'))
                                    <span class="help-block error text-danger">
                              <strong>{{ $errors->first('category_id') }}</strong>
                              </span>
                                @endif
                            </div>


                            <div>
                                <label for="subCategory">Одбери Покатегорија *</label>
                                <select id="subCategory" class="form-control" name="sub_category_id">
                                    <option value="" disabled selected>Одбери Поткатегорија</option>
                                    @php
                                        $subCategories = \App\Models\SubCategories::all();
                                    @endphp
                                    @foreach ($subCategories as  $subCategory)
                                        <option @if(old('sub_category_id') == $subCategory->id) selected
                                                @endif value="{{$subCategory->id}}">{{$subCategory->title}}</option>
                                    @endforeach
                                </select>
                                @if ($errors->has('sub_category_id'))
                                    <span class="help-block error text-danger">
                              <strong>{{ $errors->first('sub_category_id') }}</strong>
                              </span>
                                @endif
                            </div>

                        </div>
                        <div class="card-footer">
                            <div class="float-right">
                                <button type="submit" name="button_publish" class="btn btn-success mr-3">Зачувај
                                </button>
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
        CKEDITOR.replace('summary-ckeditor', {
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@stop
