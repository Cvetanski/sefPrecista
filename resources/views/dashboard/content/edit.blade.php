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
                        <p class="alert {{ Session::get('alert-class', 'alert-info') }}"
                           id="msg_alert">{{ Session::get('message') }}</p>
                    @endif
                    @include('dashboard.content.partials.form')
                </div>
            </div>
        </div>
    </div>
@stop
@section('js')
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script type="text/javascript">
        $('#category-select').change(function () {
            if ($(this).val() == '1' || $(this).val() == '2' || $(this).val() == '3') {
                $('#language-select').css('display', 'block');
            } else {
                $('#language-select').css('display', 'none');
            }
        });
        $(document).ready(function (e) {
            $('#image').change(function () {
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
        CKEDITOR.replace('summary-ckeditor', {
            filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token() ])}}",
            filebrowserUploadMethod: 'form'
        });
    </script>
@stop
