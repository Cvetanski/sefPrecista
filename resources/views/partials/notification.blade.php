@if ($errors->any())
    @foreach ($errors->all() as $error)
        <div class="float-lg-right">{{$error}}</div>
    @endforeach
@endif