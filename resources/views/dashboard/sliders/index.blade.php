@extends('adminlte::page')
{{--@section('css')--}}
{{--    @include('dashboard.every_page_css')--}}

{{--@endsection--}}
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-giJF6kkoqNQ00vy+HMDP7azOuL0xtbfIcaT9wjKHr8RbDVddVHyTfAAsrekwKmP1" crossorigin="anonymous">
<link href="https://gitcdn.github.io/bootstrap-toggle/2.2.2/css/bootstrap-toggle.min.css" rel="stylesheet">
{{--<link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">--}}
@section('title',  "Сите  Слајдери")
@section('content')

    <div class="modal" tabindex="-1" id="statusChange">
        <div class="modal-dialog">
            <div class="modal-content content-update">
                <div class="modal-header header-update-details">
                    <h5 class="modal-title">Notification</h5>
                    <button type="button" class="btn-success" data-bs-dismiss="modal" aria-label="Close">X</button>
                </div>
                <div class="modal-body text-white">
                    @if(Session::has('success'))
                        {{ Session::get('success') }}
                    @endif
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-12 pb-5">
            <a href="{{ route('slider.create') }}" class="btn btn-success float-left">@lang('Додади Нова Слајдер')</a>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Сите Слајдери</h3>
                </div>
                <div class="card-body">
                    <table id="main_table" class="table table-hover text-center align-middle">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Реден број</th>
                            <th scope="col">Име на слајдер</th>
                            <th scope="col">Слајдер</th>
                            <th scope="col">Статус</th>
                            <th scope="col">Акција</th>
                        </tr>
                        </thead>
                        <tbody id="blog_posts_for_ajax">
                        @include('dashboard.sliders.list')
                        </tbody>
                    </table>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
        <!-- /.col -->
    </div>
    {{--    @include('dashboard.approve_modal')--}}
@stop

@section('js')
    {{--    @include('dashboard.every_page_script')--}}

    <script
        src="http://code.jquery.com/jquery-3.5.1.js"
        integrity="sha256-QWo7LDvxbWT2tbbQ97B53yJnYU3WhH/C8ycbRAkjPDc="
        crossorigin="anonymous"></script>
    <script src="https://gitcdn.github.io/bootstrap-toggle/2.2.2/js/bootstrap-toggle.min.js"></script>
    <!-- JavaScript Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-ygbV9kiqUc6oa4msXn9868pTtWMgiQaeYH7/t7LECLbyPA2x65Kgf80OJFdroafW" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-modal/0.9.1/jquery.modal.min.css" />


    @stack('scripts')
    </body>
    </html>

    @if(Session::has('success'))
        <script>
            $(document).ready(function (){
                $("#statusChange").modal('show')
            });
        </script>
    @endif



    <script>
        $(function() {
            $('.toggle-class').change(function() {
                let status = $(this).prop('checked') === true ? 1 : 0;
                let slider_id = $(this).data('id');
                // console.log(published);
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{route ('publish-unpublish-slider') }}',
                    data: {'status': status, 'slider_id': slider_id},
                    success: function(data){
                        console.log(data.success)
                    }
                });
            })
        })
    </script>

@stop
