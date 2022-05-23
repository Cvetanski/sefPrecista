@foreach($subCategories as $category)

    <tr>
        <td>{{ $loop->iteration }}</td>
        <td>{!! $category->title !!}</td>
        <td>{!! $category->description !!}</td>
        <td>{!! $category->categories->title !!}</td>
        <td>{!! $category->slug !!}</td>
        <td>
            <input data-id="{{$category->id}}" class="toggle-class" type="checkbox" data-onstyle="success" data-offstyle="danger" data-toggle="toggle" data-on="Активна" data-off="Неактивна" {{ $category->published == true ? 'checked' : '' }}>
        </td>
        <td>
            <div class="btn-group-vertical">
                <a href="{{ route('subcategories.edit', ['id' => $category->id]) }}" class="btn btn-warning">Edit</a>
                {{--                @if(Auth::user()->user_role()['slug'] == 'super_admin' || Auth::user()->user_role()['slug'] == 'admin')--}}
                {{--                                    <button type="button" class="btn btn-danger delete_post_btn" value="faq" id="{{ $faq->id }}">Delete</button>--}}
                <form  class="button" action="{{route('subcategories.delete',['id'=>$category->id])}}">
                    <a  class="btn btn-danger"  onclick="return confirm('Дали сте сигурни дека сакате да ја избришите оваа ?')" href="{{route('subcategories.delete', $category->id)}}">Delete</a>
                </form>
                {{--                @endif--}}
            </div>
        </td>
    </tr>
@endforeach



