<?php

    namespace App\Http\Controllers\Content;

    use App\Http\Controllers\Controller;
    use App\Models\Category;
    use App\Models\Content;
    use App\Models\SubCategories;
    use Illuminate\Http\Request;

    class ContentController extends Controller
    {
        public function index()
        {
            $contents = Content::orderBy('id', 'desc')->paginate(3);

//        return $contents;

            return view('dashboard.content.index', compact('contents'));
        }

        public function create()
        {
            $contents = Content::all();

            return view('dashboard.content.create', compact('contents'));
        }

        public function store(Request $request)
        {
            $content = new Content($request->all());

            if (isset($request->sub_category_id)) {
                $getSlug = SubCategories::find($request->sub_category_id)->slug;
            } else {
                $getSlug = Category::find($request->category_id)->slug;
            }

            $content->slug = $getSlug;

            if ($request->hasFile('image')) {
                $request->validate([
                    'image' => 'mimes:jpeg,bmp,png,jpg,svg,mpg4,mp4',
                ]);
                $request->image->store('content', 'public');
            }

            $content->image      = $request->image->hashName();
            $content->section_id = $request->section_id;

            $content->save();

            return redirect('dashboard/content')->with('message', 'uspesno kreira sodrzina');
        }

        public function update(Request $request, $id)
        {
            try {
                $content = Content::find($id);

                if (isset($request->sub_category_id)) {
                    $getSlug = SubCategories::find($request->sub_category_id)->slug;
                } else {
                    $getSlug = Category::find($request->category_id)->slug;
                }
                $content->slug = $getSlug;

                if ($request->hasFile('image')) {
                    $request->validate([
                        'image' => 'mimes:jpeg,bmp,png,jpg,svg,mpg4,mp4',
                    ]);
                    $request->image->store('content', 'public');
                    $content->image = $request->image->hashName();
                }

                $content->title             = $request->title;
                $content->short_description = $request->short_description;
                $content->section_id        = $request->section_id;
                $content->category_id       = $request->category_id;
                $content->sub_category_id   = $request->sub_category_id;
                $content->description       = $request->description;

                $content->update();
            } catch (\Exception $e) {
                return response()->json([
                    'message' => $e->getMessage(),
                ]);
            }

            return redirect('dashboard/content')->with('message', 'Успешно ја ажуриравте содржината');
        }

        public function edit($id)
        {
            $content       = Content::findOrFail($id);
            $categories    = Category::all();
            $subCategories = SubCategories::all();

//        dd($content);
            return view('dashboard.content.edit')->with([
                'content'       => $content,
                'categories'    => $categories,
                'subCategories' => $subCategories,
            ]);
        }

        public function delete($id)
        {
            $content = Content::findOrFail($id);

//        dd($content);
            $content->delete();

            return redirect('dashboard/content')->with('message', 'Успешно ја избришавте содржината!');
        }

        public function publish(Request $request)
        {
            \Log::info($request->all());

            $content = Content::findOrFail($request->content_id);

            $content->publication_status = $request->publication_status;

            $content->save();

            return response()->json(['success' => 'Успешно го променивте статусот на категоријата!']);
        }
    }
