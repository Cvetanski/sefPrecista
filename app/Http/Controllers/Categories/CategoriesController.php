<?php

namespace App\Http\Controllers\Categories;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use App\Models\Section;
use Illuminate\Http\Request;

class CategoriesController extends Controller
{
    public function index()
    {
        $categories = Categories::orderBy('id','desc')->get();


        return view('dashboard.categories.index')->with('categories',$categories);
    }

    public function create()
    {
        $categories = Categories::get();
        $sections = Section::all();

        return view('dashboard.categories.create',compact('categories','sections'));
    }

    public function store(Request $request)
    {
        $categories = new Categories($request->all());
        $categories->section_id = $request->section_id;
        $categories->slug = $categories->title;
//        dd($categories);
        $categories->save();

        return redirect()->route('categories')->with('error', "Успешно додадовте Категорија!");
    }

    public function publish(Request $request)
    {
        \Log::info($request->all());

        $categories = Categories::find($request->category_id);

        $categories->published = $request->published;

        $categories->save();

        return response()->json(['success' => 'Успешно го променивте статусот на категоријата!']);
    }

    public function edit($id)
    {
        $categories=Categories::findOrFail($id);
        $sections = Section::all();
//        dd($sections);
        return view('dashboard.categories.edit',compact('categories','sections'));
    }

    public function update(Request $request, $id)
    {
        $categories=Categories::findOrFail($id);

        $data= $request->all();

        $categories->fill($data)->save();

        return redirect()->route('categories')->with('message', "Успешно ја изменивте Категоријата!");
    }

    public function delete($id)
    {
        $categories = Categories::findOrFail($id);

        $categories->delete();

        return redirect()->route('categories')->with('message', "Успешно ја избришавте Категоријата!");
    }
}
