@if($content->exists)
    <form class="form-horizontal" method="POST" action="{{ route('content.update',$content) }}"
          enctype="multipart/form-data">
        @method('put')
        @csrf
        @else
            <form class="form-horizontal" method="POST" action="{{ route('content.store') }}"
                  enctype="multipart/form-data">
                @csrf
                @endif
                <div class="card-body">
                    <div class="form-group">
                        <label for="title">Наслов</label>
                        <input type="text" class="form-control" value="{!! old('title', $content->title ?? null) !!}"
                               name="title" rows="10"
                               placeholder="Внеси Краток Опис">
                        @if ($errors->has('title'))
                            <span class="help-block error">
                            <strong>{{ $errors->first('title') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="text">Краток опис</label>
                        <textarea type="text" class="form-control" name="short_description" rows="10"
                                  placeholder="Внеси Краток Опис"
                                  required>{!! old('short_description', $content->short_description ?? null) !!}</textarea>
                        @if ($errors->has('short_description'))
                            <span class="help-block error">
                            <strong>{{ $errors->first('short_description') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="text"> Oпис </label>
                        <textarea type="text" class="form-control" id="summary-ckeditor" name="description"
                                  rows="10" placeholder="Внеси Опис"
                                  required>{{ old('description', $content->description ?? null) }}</textarea>
                        @if ($errors->has('description'))
                            <span class="help-block error">
                            <strong>{{ $errors->first('description') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div class="form-group">
                        <label for="file">Внеси слика</label>
                        <input type="file" class="form-control-file" id="image" name="image2"
                               placeholder="Внеси Слика" value="{!! old('image2') !!}" required>
                        @if ($errors->has('image2'))
                            <span class="help-block error">
                            <strong>{{ $errors->first('image2') }}</strong>
                        </span>
                        @endif
                    </div>

                    <div>
                        <label for="section">Одбери Секција *</label>
                        <select id="section" class="form-control" name="section_id">
                            <option value="" disabled selected>Одбери Секција</option>
                            @foreach($sections as $section)
                                <option value="{{ $section->id }}"@if (!empty($content->section->id))
                                    {{($section->id==$content->section->id)? 'selected':'' }}
                                        @endif>{{ $section->title }}</option>
                            @endforeach
                        </select>
                        @if ($errors->has('section_id'))
                            <span class="help-block error text-danger">
                              <strong>{{ $errors->first('section_id') }}</strong>
                              </span>
                        @endif
                    </div>


                    <div>
                        <label for="category">Одбери Категорија *</label>
                        <select id="category" class="form-control" name="category_id">
                            <option value="" disabled selected>Одбери Категорија</option>
                            @foreach($categories as $category)
                                <option value="{{$category->id}}">{{$category->title}}</option>
                                @foreach($category->childrenCategories as $sub)
                                    <option value="{{$sub->id}}">- {{$sub->title}}</option>
                                @endforeach
                            @endforeach
                        </select>
                        @if ($errors->has('category_id'))
                            <span class="help-block error text-danger">
                              <strong>{{ $errors->first('category_id') }}</strong>
                              </span>
                        @endif
                    </div>
                </div>
                <div class="card-footer">
                    <div class="float-right">
                        <button type="submit" name="button_publish" class="btn btn-success mr-3">Зачувај
                        </button>
                    </div>
                </div>
            </form>
