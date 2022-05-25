@if($category->exists)
    <form class="form-horizontal" method="POST" action="{{ route('categories.update',$category) }}"
          enctype="multipart/form-data">
        @method('put')
        @csrf
        @else
            <form class="form-horizontal" method="POST" action="{{ route('categories.store') }}"
                  enctype="multipart/form-data">
                @csrf
                @endif
                <div class="form-group">
                    <label for="title" class="control-label">{{trans('messages.title')}}</label>

                    <input id="title" class="form-control" type="text" name="title"
                           placeholder="{{trans('messages.enter_category_title')}}"
                           value="{{ old('title', $category->title ?? null) }}"/>
                </div>
                @if ($categories == !null)
                    @if($categories>2)
                        <div class="form-group">
                            <label for="name" class="control-label">{{trans('messages.sub_category')}}</label>
                            <select name="parent_id" id="parent_id" class="form-control">
                                @if (!empty($category->getParentsNames()))
                                    <option
                                            value=""
                                            selected>{{ $category->getParentsNames()}}</option>
                                @else
                                    <option value="">Select category</option>
                                @endif
                                @if ($categories)
                                    @foreach ($categories as $categoryList)
                                        <option value="{{ $categoryList['id'] }}">{{ $categoryList['title'] }}</option>
                                    @endforeach
                                @endif
                            </select>
                        </div>
                    @endif
                @endif
                <div class="form-group">
                    <label for="section">Одбери Секција</label>
                    <select name="section_id" id="section_id" class="form-control">
                        <option disabled selected>Одбери Секција</option>
                        @foreach($sections as $section)
                            <option value="{{ $section->id }}"@if (!empty($category->section->id))
                                {{($section->id==$category->section->id)? 'selected':'' }}
                                    @endif>{{ $section->title }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="form-group">
                    <label for="text">Краток опис</label>
                    <textarea type="text" class="form-control text" id="description" name="description" rows="10"
                              placeholder="Внеси Опис"
                              required>{!! old('description', $category->description ?? null) !!}</textarea>
                </div>
                <button type="submit">Save</button>
            </form>
    </form>
