<?php

    namespace App\Http\Controllers\Content;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\Content\StoreRequest;
    use App\Http\Requests\Content\UpdateRequest;
    use App\Models\Category;
    use App\Models\Content;
    use App\Models\Section;
    use App\Traits\ImageUpload;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Http\JsonResponse;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Http\Request;

    class ContentController extends Controller
    {
        use ImageUpload;

        /**
         * @return Application|Factory|View
         */
        public function index()
        {
            $contents = Content::with('category', 'section')->orderBy('id', 'desc')->paginate(3);

            return view('dashboard.content.index', compact('contents'));
        }

        /**
         * @return Application|Factory|View
         */
        public function create()
        {
            $content    = new Content();
            $sections   = Section::get();
            $categories = Category::whereNull('parent_id')
                                  ->with('childrenCategories')
                                  ->get();

            return view('dashboard.content.create', compact('content', 'sections', 'categories'));
        }

        /**
         * @param  StoreRequest  $request
         *
         * @return RedirectResponse
         */
        public function store(StoreRequest $request)
        {
            Content::create(
                $request->except('image2') + [
                    'image2' => $this->verifyAndStoreImage($request),
                ]
            );

            return redirect()->route('content.index')->with('message', 'uspesno kreira sodrzina');
        }

        /**
         * @param  Content  $content
         *
         * @return Application|Factory|View
         */
        public function edit(Content $content)
        {
            $categories = Category::whereNull('parent_id')
                                  ->with('childrenCategories')
                                  ->get();
            $sections   = Section::get();

            return view('dashboard.content.edit', compact('content', 'categories', 'sections'));
        }

        /**
         * @param  UpdateRequest  $request
         * @param  Content  $content
         *
         * @return RedirectResponse
         */
        public function update(UpdateRequest $request, Content $content)
        {
            if ($request->hasFile('image2')) {
                $content->update(
                    $request->except('image2') + [
                        'image2' => $this->verifyAndStoreImage($request),
                    ]
                );
            } else {
                $content->update($request->all());
            }

            return redirect()->route('content.index')->with('message', 'Успешно ја ажуриравте содржината');
        }

        /**
         * @param  Content  $content
         *
         * @return RedirectResponse
         */
        public function delete(Content $content)
        {
            $content->delete();

            return redirect()->back()->with('message', 'Успешно ја избришавте содржината!');
        }

        /**
         * @param  Request  $request
         *
         * @return JsonResponse
         */
        public function publish(Request $request)
        {
            $content = Content::findOrFail($request->content_id);

            $content->publication_status = $request->publication_status;

            $content->save();

            return response()->json(['success' => 'Успешно го променивте статусот на категоријата!']);
        }

        /**
         * Make paths for storing images.
         *
         * @return object
         */
        public function makePaths(): object
        {
            $original  = public_path().'/uploads/images/content/';
            $thumbnail = public_path().'/uploads/images/content/thumbnails/';
            $medium    = public_path().'/uploads/images/content/medium/';

            return (object)compact('original', 'thumbnail', 'medium');
        }
    }
