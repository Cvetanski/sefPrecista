    @foreach($contents as $content)

    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{!! $content->title !!}</td>
{{--            <td>--}}
{{--                {{ \Illuminate\Support\Str::limit($content->description, 30, '') }}--}}
{{--                @if (strlen($content->description) > 100)--}}
{{--                    <span id="dots">...</span>--}}
{{--                    <span id="more"> {!! $content->description !!}</span>--}}
{{--                @endif--}}
{{--                <button onclick="myFunction()" id="myBtn">Прочитај Повеќе</button>--}}
{{--            </td>--}}
        <td>{!! $content->short_description !!}</td>
        @if(isset($content->category['title']))
        <td>{!! $content->category['title'] !!}</td>
        @else
            <td>N/A</td>
        @endif
        @if(isset($content->subCategory['title']))
        <td>{!! $content->subCategory['title']!!}</td>
        @else
            <td>N/A</td>
        @endif
        <td>
            <img src="{{asset('storage/content/')}}/{{$content->image}}" alt="{{$content->title}}" style="width: 80px; height: 100px" >
        </td>
        <td>
            <input data-id="{{$content->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Активна" data-off="Неактивна" {{ $content->publication_status == true ? 'checked' : '' }}>
        </td>
        <td>
            <div class="btn-group-vertical">
                <a href="{{ route('content.edit', ['id' => $content->id]) }}" class="btn btn-warning">Измени</a>
                {{--                @if(Auth::user()->user_role()['slug'] == 'super_admin' || Auth::user()->user_role()['slug'] == 'admin')--}}
                {{--                                    <button type="button" class="btn btn-danger delete_post_btn" value="faq" id="{{ $faq->id }}">Delete</button>--}}
                <form  class="button" action="{{route('content.delete',['id'=>$content->id])}}">
                    <a  class="btn btn-danger"  onclick="return confirm('Дали сте сигурни дека сакате да ја избришите оваа содржина !?')" href="{{route('content.delete', $content->id)}}">Избриши</a>
                </form>
                {{--                @endif--}}
            </div>
        </td>
    </tr>
@endforeach

<script>
    function myFunction() {
    var dots = document.getElementById("dots");
    var moreText = document.getElementById("more");
    var btnText = document.getElementById("myBtn");

    if (dots.style.display === "none") {
    dots.style.display = "inline";
    btnText.innerHTML = "Прочитај Повеќе";
    moreText.style.display = "none";
    } else {
    dots.style.display = "none";
    btnText.innerHTML = "Сокриј";
    moreText.style.display = "inline";
    }
    }
</script>


