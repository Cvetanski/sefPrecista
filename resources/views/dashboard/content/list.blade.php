@foreach($contents as $content)

    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{{ $content->title ?? ''}}</td>
        <td>{!! $content->short_description ?? ''!!}</td>
        <td>{!! $content->category['title'] ?? ''!!}</td>
        <td>
            <img src="{{$content->imageFull}}" alt="{{$content->title}}"
                 style="width: 80px; height: 100px">
        </td>
        <td>
            <input data-id="{{$content->id}}" class="toggle-class" type="checkbox" data-onstyle="success"
                   data-offstyle="danger" data-toggle="toggle" data-on="Активна"
                   data-off="Неактивна" {{ $content->publication_status == true ? 'checked' : '' }}>
        </td>
        <td>
            <div class="btn-group-vertical">
                <a href="{{ route('content.edit', $content->id) }}" class="btn btn-warning">Измени</a>
                <form class="button" action="{{route('content.destroy',$content->id)}}">
                    <a class="btn btn-danger"
                       onclick="return confirm('Дали сте сигурни дека сакате да ја избришите оваа содржина !?')"
                       href="{{route('content.destroy', $content->id)}}">Избриши</a>
                </form>
            </div>
        </td>
    </tr>
@endforeach

<script>
    function myFunction() {
        const dots = document.getElementById("dots");
        const moreText = document.getElementById("more");
        const btnText = document.getElementById("myBtn");

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


