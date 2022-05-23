<?php

    namespace App\Http\Controllers\Home;

    use App\Http\Controllers\Controller;
    use App\Models\Category;
    use App\Models\Content;
    use App\Models\Image;
    use App\Models\News;
    use App\Models\Slider;

    class HomeController extends Controller
    {
        /**
         * Create a new controller instance.
         *
         * @return void
         */
//    public function __construct()
//    {
//        $this->middleware('auth');
//    }

        /**
         * Show the application dashboard.
         *
         * @return \Illuminate\Contracts\Support\Renderable
         */
        public function index()
        {
            if (auth()->user() == null) {
                return view('home.coming_soon');
            }
            $categories = Category::all();
            $sliders    = Slider::where('status', true)->get();
            $news       = News::all();
            $images     = Image::all();

            return view('home')->with(['categories' => $categories, 'sliders' => $sliders, 'news' => $news, 'images' => $images]);
        }

        public function singlePost($slug)
        {
            $categories = Category::all();
            $news       = News::all();
            if (auth()->user()) {
                $contents = Content::where('slug', $slug)
                                   ->first();
            } else {
                $contents = Content::where('publication_status', true)->where('slug', $slug)
                                   ->first();
            }

            return view('home/single-post')->with(['contents' => $contents, 'categories' => $categories, 'news' => $news]);
        }

        public function newsSinglePost($news)
        {
            $categories = Category::all();
            $news       = News::where('slug', $news)->first();

//        dd($news);

//        return view('home/new-single')->with(['categories'=>$categories,'news'=>$news]);

            return view('home.new-single', compact('categories', 'news'));
        }

    }
