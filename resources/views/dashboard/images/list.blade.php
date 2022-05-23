@foreach($images as $image)

    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{!! $image->title !!}</td>
        <td>
            <img src="{{asset('storage/photogallery/')}}/{{$image->image}}" alt="{{$image->title}}" style="width: 80px; height: 100px" >
        </td>
{{--        <td>--}}
{{--            <input data-id="{{$image2->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Активна" data-off="Неактивна" {{ $slider->status == true ? 'checked' : '' }}>--}}
{{--        </td>--}}
        <td>
            <div class="btn-group-vertical">
                {{--                @if(Auth::user()->user_role()['slug'] == 'super_admin' || Auth::user()->user_role()['slug'] == 'admin')--}}
                {{--                                    <button type="button" class="btn btn-danger delete_post_btn" value="faq" id="{{ $faq->id }}">Delete</button>--}}
                <form  class="button" action="{{route('images.delete',['id'=>$image->id])}}">
                    <a  class="btn btn-danger"  onclick="return confirm('Дали сте сигурни дека сакате да ја избришите оваа Слика?')" href="{{route('images.delete', $image->id)}}">Избриши</a>
                </form>
                {{--                @endif--}}
            </div>
        </td>
    </tr>
@endforeach



