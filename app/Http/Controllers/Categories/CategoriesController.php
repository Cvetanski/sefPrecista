<?php

    namespace App\Http\Controllers\Categories;

    use App\Http\Controllers\Controller;
    use App\Http\Requests\Category\StoreRequest;
    use App\Http\Requests\Category\UpdateRequest;
    use App\Models\Category;
    use App\Models\Section;
    use Illuminate\Contracts\Foundation\Application;
    use Illuminate\Contracts\View\Factory;
    use Illuminate\Contracts\View\View;
    use Illuminate\Http\JsonResponse;
    use Illuminate\Http\RedirectResponse;
    use Illuminate\Http\Request;

    class CategoriesController extends Controller
    {
        /**
         * @return Application|Factory|View
         */
        public function index()
        {
            $categories = Category::with('section')->orderBy('id', 'desc')->get();

            return view('dashboard.categories.index', compact('categories'));
        }

        /**
         * @return Application|Factory|View
         */
        public function create()
        {
            $categories = Category::getTree();
            $category   = new Category();
            $sections   = Section::get();

            return view('dashboard.categories.create', compact('categories', 'sections', 'category'));
        }

        /**
         * @param  StoreRequest  $request
         *
         * @return RedirectResponse
         */
        public function store(StoreRequest $request)
        {
            Category::create($request->all());

            return redirect()->route('categories.index')->with('error', "Успешно додадовте Категорија!");
        }

        /**
         * @param  Category  $category
         *
         * @return Application|Factory|View
         */
        public function edit(Category $category)
        {
            $categories = Category::getTree();
            $sections   = Section::all();

            return view('dashboard.categories.edit', compact('categories', 'sections', 'category'));
        }

        /**
         * @param  UpdateRequest  $request
         * @param  Category  $categories
         *
         * @return RedirectResponse
         */
        public function update(UpdateRequest $request, Category $categories)
        {
            $categories->update($request->all());

            return redirect()->route('categories.index')->with('message', "Успешно ја изменивте Категоријата!");
        }

        /**
         * @param  Category  $categories
         *
         * @return RedirectResponse
         */
        public function delete(Category $categories)
        {
            $categories->delete();

            return redirect()->route('categories.index')->with('message', "Успешно ја избришавте Категоријата!");
        }

        /**
         * @param  Request  $request
         *
         * @return JsonResponse
         */
        public function publish(Request $request)
        {
            $categories = Category::find($request->category_id);

            $categories->published = $request->published;

            $categories->save();

            return response()->json(['success' => 'Успешно го променивте статусот на категоријата!']);
        }
    }
