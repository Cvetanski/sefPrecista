@extends('adminlte::page')
@section('css')
    {{--    @include('dashboard.every_page_css')--}}
@endsection
@section('title', 'Изменете ја Содржината')
@section('content_header')

@stop
@section('content')
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-12">
                <div class="card card-primary">
                    <div class="card-header">
                        <h3 class="card-title">Изменете ја Содржината</h3>
                    </div>
                    @if(Session::has('message'))
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}" id="msg_alert">{{ Session::get('message') }}</p>
                    @endif
                        <form method="POST" action="{{route('content.update', ['id' => $content->id])}}"  enctype="multipart/form-data">
                        @csrf
                            @method('PUT')
                        <div class="card-body">
                            <input type="hidden" name="is_edit" id="is_edit" value="1">
                            <input type="hidden" name="post_id" id="post_id" value="{{ $content->id }}">

                            <div class="form-group">
                                <label for="text">Име на Содржината</label>
                                <input type="text" class="form-control" id="title" name="title" placeholder="Име" value="{!! $content->title !!}  {!! old('title') !!}" required>
                                @if ($errors->has('title'))
                                    <span class="help-block error">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="text">Краток Опис на содржината</label>
                                <input type="text" class="form-control"  id="short_description" name="short_description" placeholder="Краток опис на содржината" value="{!! $content->short_description !!}  {!! old('short_description') !!}" required>
                                @if ($errors->has('short_description'))
                                    <span class="help-block error">
                            <strong>{{ $errors->first('short_description') }}</strong>
                        </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="text" >Опис на содржината</label>
                                <textarea type="text" class="form-control"  id="summary-ckeditor" name="description" placeholder="Oпис на содржината" required> {!! Request::old('content', $content->description) !!}</textarea>
                                @if ($errors->has('description'))
                                    <span class="help-block error">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <strong>Одбери Категорија</strong>
                                <select name="category_id" class="form-control custom-select">
                                    @foreach($categories as $category)
                                        <option value="{{ $category->id }}" @if(old('category') == $category->id || $category->id == $content->category->id) selected @endif>{{ $category->title }}</option>
                                    @endforeach
                                </select>
                            </div>

                            @if($content->subCategory)
                            <div class="form-group">
                                <strong>Одбери Поткатегорија</strong>
                                <select name="sub_category_id" class="form-control custom-select">
                                    @foreach($subCategories as $subCategory)
                                        <option value="{{ $subCategory->id }}" @if(old('subCategory') == $subCategory->id || $subCategory->id == $content->subCategory->id) selected @endif>{{ $subCategory->title }}</option>
                                    @endforeach
                                </select>
                            </div>
                            @endif

                            <div class="form-group">
                                <label for="file">Внеси Кавер Слика</label>
                                @if ("/storage/content/{{ $content->image }}")
                                    <div style="margin-bottom: inherit">
                                        <img  id="preview-image-before-upload" src="{{asset('storage/content/')}}/{{$content->image}}" alt="{{$content->title}}" style="width: 80px; height: 100px" >
                                    </div>
                                @endif
                                <input type="file" class="form-control-file" id="image" name="image" placeholder="Внеси Слика" value="{!! old('image') !!}">
                                @if ($errors->has('image'))
                                    <span class="help-block error">
                                         <strong>{{ $errors->first('image') }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="form-group">
                                <label for="date">Изменето во</label>
                                <input type="text" name="created_at" class="date form-control" readonly required="" value="@if($content->created_at){{\Carbon\Carbon::parse($content ->created_at)->format('m/d/y')}} @else{!! old('created_at') !!}@endif" />
                            </div>
                        </div>

                        <div class="card-footer">
                            <button type="submit" class="btn btn-primary mr-3">Измени</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script type="text/javascript">
    $('#category-select').change(function(){
        if($(this).val() == '1' || $(this).val() == '2' || $(this).val() == '3'){
            $('#language-select').css('display', 'block');
        } else {
            $('#language-select').css('display', 'none');
        }
    });
    $(document).ready(function (e) {
        $('#image').change(function(){
            let reader = new FileReader();
            reader.onload = (e) => {
                $('#preview-image-before-upload').attr('src', e.target.result);
            }
            reader.readAsDataURL(this.files[0]);
        });
    });
</script>

<script src="{{ asset('ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace( 'summary-ckeditor', {
        filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
        filebrowserUploadMethod: 'form'
    });
</script>
@stop
