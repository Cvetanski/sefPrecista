<?php

namespace App\Http\Controllers\SubCategories;

use App\Http\Controllers\Controller;
use App\Models\Categories;
use Illuminate\Http\Request;


class SubCategories extends Controller
{
    public function index()
    {
        $subCategories = \App\Models\SubCategories::orderBy('id','desc')->get();

//        dd($subCategories[0]->categories);
        return view('dashboard.subcategories.index')->with(['subCategories'=>$subCategories]);
    }

    public function create()
    {
        $subCategory = \App\Models\SubCategories::get();
        $categories = Categories::get();

        return view('dashboard.subcategories.create')->with(['subCategories'=>$subCategory,'categories'=>$categories]);
    }

    public function store(Request $request)
    {
        $subCategory = new \App\Models\SubCategories($request->all());
        $subCategory->save();

        return redirect()->route('subcategories')->with('message', "Успешно додадовте Категорија!");
    }

    public function edit($id)
    {
        $subCategory = \App\Models\SubCategories::findOrFail($id);
        $categories = Categories::all();

        return view('dashboard.subcategories.edit',compact('subCategory','categories'));
    }

    public function update(Request $request,$id)
    {
        $subCategories=\App\Models\SubCategories::findOrFail($id);

        $data= $request->all();

        $subCategories->fill($data)->save();

        return redirect()->route('subcategories')->with('message', "Успешно ја изменивте Категоријата!");
    }

    public function delete($id)
    {
        $subCategory = \App\Models\SubCategories::findOrFail($id);

        $subCategory->delete();

        return redirect()->route('subcategories')->with('message','Успешно ја избришавте поткатегоријата!');
    }

    public function publish(Request $request)
    {
        $subCategories = \App\Models\SubCategories::findOrFail($request->sub_category_id);

        $subCategories->published = $request->published;

        $subCategories->save();

        return response()->json(['success'=> 'Успешно го сменивте статусот на подкатегоријата!']);
    }
}
