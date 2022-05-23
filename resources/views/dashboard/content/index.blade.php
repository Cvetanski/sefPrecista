@extends('adminlte::page')
{{--@section('css')--}}
{{--    @include('dashboard.every_page_css')--}}

{{--@endsection--}}
@section('title',  "Сите Содржини")
@section('content')
    <div class="row">
        <div class="col-12 pb-5">
            <a href="{{ route('content.create') }}" class="btn btn-success float-left">@lang('Додади Нова Содржина')</a>
        </div>
        <div class="col-sm-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Сите Содржини</h3>
                </div>
                <div class="card-body">
                    <table id="main_table" class="table table-hover text-center align-middle">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Реден број</th>
                            <th scope="col">Име</th>
{{--                            <th scope="col">Опис</th>--}}
                            <th scope="col">Краток Опис</th>
                            <th scope="col">Припаѓа на Категорија</th>
                            <th scope="col">Припаѓа на Поткатегорија</th>
                            <th scope="col">Слика</th>
                            <th scope="col">Статус</th>
                            <th scope="col">Акција</th>
                        </tr>
                        </thead>
                        <tbody id="blog_posts_for_ajax">
                        @include('dashboard.content.list')
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
    <script type="text/javascript">
        // Hide the extra content initially:
        $('.read-more-content').addClass('hide_content')
        $('.read-more-show, .read-more-hide').removeClass('hide_content')

        // Set up the toggle effect:
        $('.read-more-show').on('click', function(e) {
            $(this).next('.read-more-content').removeClass('hide_content');
            $(this).addClass('hide_content');
            e.preventDefault();
        });
        $('.read-more-hide').on('click', function(e) {
            var p = $(this).parent('.read-more-content');
            p.addClass('hide_content');
            p.prev('.read-more-show').removeClass('hide_content'); // Hide only the preceding "Read More"
            e.preventDefault();
        });
    </script>

    <script>
        $(function() {
            $('.toggle-class').change(function() {
                let publication_status = $(this).prop('checked') === true ? 1 : 0;
                let content_id = $(this).data('id');
                // console.log(published);
                $.ajax({
                    type: "GET",
                    dataType: "json",
                    url: '{{route ('publish-unpublish-content') }}',
                    data: {'publication_status': publication_status, 'content_id': content_id},
                    success: function(data){
                        console.log(data.success)
                    }
                });
            })
        })
    </script>

@stop
