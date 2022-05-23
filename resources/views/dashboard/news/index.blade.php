@extends('adminlte::page')
{{--@section('css')--}}
{{--    @include('dashboard.every_page_css')--}}

{{--@endsection--}}
@section('title',  "Сите Новости")
@section('content')
    <div class="row">
        <div class="col-12 pb-5">
            <a href="{{ route('news.create') }}" class="btn btn-success float-left">@lang('Додади Новост')</a>
        </div>
        <div class="col-12">
            <div class="card">
                <div class="card-header">
                    <h3 class="card-title">Сите Новости</h3>
                </div>
                <div class="card-body">
                    <table id="main_table" class="table table-hover text-center align-middle">
                        <thead class="thead-dark">
                        <tr>
                            <th scope="col">Реден број</th>
                            <th scope="col">Наслов</th>
                            <th scope="col">Краток Опис</th>
                            <th scope="col">Слика</th>
                            <th scope="col">Назнака</th>
                            <th scope="col">Акција</th>
                        </tr>
                        </thead>
                        <tbody id="blog_posts_for_ajax">
                        @include('dashboard.news.list')
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

@stop
