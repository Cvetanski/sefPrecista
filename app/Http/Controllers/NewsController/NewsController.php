<?php

namespace App\Http\Controllers\NewsController;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Intervention\Image\Facades\Image;

class NewsController extends Controller
{
    public function index()
    {
        $news = News::all();

        return view('dashboard.news.index',compact('news'));
    }

    public function create()
    {
        return view('dashboard.news.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
            'short_description' => 'required',
            'description' => 'required',
            'slug' => 'required',
        ]);

        if ($request->hasFile('image2')) {

            $request->validate([
                'image2' => 'mimes:jpeg,bmp,png,jpg,svg,mpg4,mp4',
                'cover_image' => 'mimes:jpeg,bmp,png,jpg,svg,mpg4,mp4'
            ]);

            $image = $request->file('image2');

            $request->cover_image->store('cover_news', 'public');

            $imageName = $image->hashName();
            $fileName =  $imageName;
            Image::make($image)->resize(1024,683)->save(storage_path('app/public/news/' . $fileName));
        }
            $news = new News([
                "title" => $request->get('title'),
                "description" => $request->get('description'),
                "short_description" => $request->get('short_description'),
                "slug" => $request->get('slug'),
                "cover_image" => $request->cover_image->hashName(),
                "image" => $fileName
            ]);

            $news->save();

        return redirect('dashboard/news')->with('message','Успешно додадовте слајдер!');
    }

    public function delete($id)
    {
        $news = News::findOrFail($id);

        $news->delete();

        return back()->with('message','Успешно додадовте слајдер!');
    }
}
