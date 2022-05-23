<?php

namespace App\Http\Controllers\SliderController;

use App\Http\Controllers\Controller;
use App\Models\Slider;
use Illuminate\Http\Request;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();

        return view('dashboard.sliders.index',compact('sliders'));
    }

    public function create()
    {
        return view('dashboard.sliders.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required',
        ]);

        if ($request->hasFile('photo')) {

            $request->validate([
                'photo' => 'mimes:jpeg,bmp,png,jpg,svg,MPEG-4,mp4'
            ]);

            $request->photo->store('slider', 'public');

            $slider = new Slider([
                "title" => $request->get('title'),
                "photo" => $request->photo->hashName()
            ]);
            $slider->save(); // Finally, save the record.
        }

        return back()->with('message','Успешно додадовте слајдер!');
    }

    public  function delete($id)
    {
        $slider = Slider::findOrFail($id);

        $slider->delete();

        return redirect()->route('slider')->with('message', "Успешно го избришавте Слајдерот!");
    }

    public function publish(Request $request)
    {
        \Log::info($request->all());

        $slider = Slider::find($request->slider_id);

        $slider->status = $request->status;

        $slider->save();

        return response()->json(['success' => 'Успешно го променивте статусот на категоријата!']);
    }
}
