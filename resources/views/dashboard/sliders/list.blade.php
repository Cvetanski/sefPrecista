@foreach($sliders as $slider)

    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{!! $slider->title !!}</td>
        <td>
        <img src="{{asset('storage/slider/')}}/{{$slider->photo}}" alt="{{$slider->title}}" style="width: 80px; height: 100px" >
        </td>
        <td>
            <input data-id="{{$slider->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Активна" data-off="Неактивна" {{ $slider->status == true ? 'checked' : '' }}>
        </td>
        <td>
            <div class="btn-group-vertical">
                {{--                @if(Auth::user()->user_role()['slug'] == 'super_admin' || Auth::user()->user_role()['slug'] == 'admin')--}}
                {{--                                    <button type="button" class="btn btn-danger delete_post_btn" value="faq" id="{{ $faq->id }}">Delete</button>--}}
                <form  class="button" action="{{route('slider.delete',['id'=>$slider->id])}}">
                    <a  class="btn btn-danger"  onclick="return confirm('Дали сте сигурни дека сакате да го избришите овај Слајдер?')" href="{{route('slider.delete', $slider->id)}}">Избриши</a>
                </form>
                {{--                @endif--}}
            </div>
        </td>
    </tr>
@endforeach



