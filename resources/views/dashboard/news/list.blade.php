@foreach($news as $new)

    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{!! $new->title !!}</td>
        <td>{!! $new->short_description !!}</td>
        <td>
            <img src="{{asset('storage/news')}}/{{$new->image}}" alt="{{$new->title}}" style="width: 100px; height: 100px">
        </td>
        <td>{!! $new->slug !!}</td>
        <td>
            <div class="btn-group-vertical">
                {{--                @if(Auth::user()->user_role()['slug'] == 'super_admin' || Auth::user()->user_role()['slug'] == 'admin')--}}
                {{--                                    <button type="button" class="btn btn-danger delete_post_btn" value="faq" id="{{ $faq->id }}">Delete</button>--}}
                <form  class="button" action="{{route('news.delete',['id'=>$new->id])}}">
                    <a  class="btn btn-danger"  onclick="return confirm('Дали сте сигурни дека сакате да ја избришите оваа Новост?')" href="{{route('news.delete', $new->id)}}">Избриши</a>
                </form>
                {{--                @endif--}}
            </div>
        </td>
    </tr>
@endforeach



