<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\SliderRequest;
use App\Models\Slider;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $sliders = Slider::latest()->paginate('8');
        return view('backend.sliders.index', compact('sliders'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.sliders.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(SliderRequest $request)
    {
        $input['status'] = $request->status;
        $slider = Slider::create($input);
        if ($image = $request->file('cover')) {
            $file_name = time() . "." . $image->getClientOriginalExtension();
            $path = public_path('/backend/img/sliders/' . $file_name);
            Image::make($image->getRealPath())->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $file_size = $image->getSize();
            $file_type = $image->getMimeType();
            $slider->media()->create([
                'name_file' => $file_name,
                'size_file' => $file_size,
                'type_file' => $file_type,
            ]);

            return redirect()->route('admin.sliders.index')->with([
                'message' => 'creation de slider est bien reçu',
                'alert-type' => 'success'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function show(Slider $slider)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function edit($slider_id)
    {
        $slider = Slider::find($slider_id);
        if (!$slider)
            return abort('404');
        return view('backend.sliders.edit', compact('slider'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function update(SliderRequest $request, $slider_id)
    {
        
        $slider = Slider::findOrFail($slider_id);
        $input['status'] = $request->status;
        $slider->update($input);
        if ($image = $request->file('cover')) {
            if ($slider->firstMedia->name_file != null && File::exists('backend/img/sliders/' . $slider->firstMedia->name_file)) {
                unlink('backend/img/sliders/' . $slider->firstMedia->name_file);
            }
            $file_name = time() . "." . $image->getClientOriginalExtension();
            $path = public_path('backend/img/sliders/' . $file_name);
            Image::make($image->getRealPath())->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $file_size = $image->getSize();
            $file_type = $image->getMimeType();
            $slider->media()->update([
                'name_file' => $file_name,
                'size_file' => $file_size,
                'type_file' => $file_type,
            ]);
        }
        return redirect()->route('admin.sliders.index')->with([
            'message' => 'modification de slider est bien reçu',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Slider  $slider
     * @return \Illuminate\Http\Response
     */
    public function destroy($slider_id)
    {

        $slider = Slider::findOrFail($slider_id);
        if ($slider->firstMedia->name_file != null && File::exists('backend/img/sliders/' . $slider->firstMedia->name_file)) {
            unlink('backend/img/sliders/' . $slider->firstMedia->name_file);
        }
        $slider->delete();
        return redirect()->route('admin.sliders.index')->with([
            'message' => 'suppression de slider est bien reçu',
            'alert-type' => 'danger'
        ]);
    }

    public function remove_image(Request $request)
    {

        $slider = Slider::findOrFail($request->slider_id);
        if ($slider->firstMedia->name_file != null && File::exists('backend/img/sliders/' . $slider->firstMedia->name_file)) {
            unlink('backend/img/sliders/' . $slider->firstMedia->name_file);
            $slider->firstMedia->name_file = null;
            $slider->save();
        }
        return true;
    }
}
