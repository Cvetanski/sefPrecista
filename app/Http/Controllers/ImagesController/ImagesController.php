<?php

namespace App\Http\Controllers\ImagesController;

use App\Http\Controllers\Controller;
use App\Models\Image;
use Illuminate\Http\Request;


class ImagesController extends Controller
{
    public function index()
    {
        $images = Image::all();

        return view('dashboard.images.index',compact('images'));
    }


    public function create()
    {
        return view('dashboard.images.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        if ($request->hasFile('image2')) {

            $request->validate([
                'image2' => 'mimes:jpeg,bmp,png,jpg,svg,mpg4,mp4'
            ]);

            $image = $request->file('image2');

            $imageName = $image->hashName();
            $fileName =  $imageName;
            \Intervention\Image\Facades\Image::make($image)->resize(1024,683)->save(storage_path('app/public/photogallery/' . $fileName));
        }
        $photoGallery = new Image([
            "title" => $request->get('title'),
            "slug" => 'photogallery',
            "image2" => $fileName
        ]);

        $photoGallery->save();

        return redirect('dashboard/images')->with(['message','Успешно додадовте слика во галерија!']);
    }

    public function delete($id)
    {
        $image = Image::findOrFail($id);
        $image->delete();

        return redirect('dashboard/images')->with(['message','Успешно додадовте слика во галерија!']);
    }



}
