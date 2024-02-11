<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\LogoRequest;
use App\Models\Logo;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class LogoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $logos = Logo::latest()->paginate('8');
        return view('backend.logos.index', compact('logos'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.logos.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(LogoRequest $request)
    {
        $input['status'] = $request->status;
        if ($image = $request->file('cover')) {
            $file_name = time() . "." . $image->getClientOriginalExtension();
            $path = public_path('/backend/img/logos/' . $file_name);
            Image::make($image->getRealPath())->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $input['cover'] = $file_name;

            $logo = Logo::create($input);
            return redirect()->route('admin.logos.index')->with([
                'message' => 'creation de logo est bien reçu',
                'alert-type' => 'success'
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function show(Logo $logo)
    {
        return 'show';
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function edit($logo_id)
    {
        $logo = Logo::findOrFail($logo_id);
        return view('backend.logos.edit', compact('logo'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function update(LogoRequest $request, $logo_id)
    {
        
        $logo = Logo::findOrFail($logo_id);
        $input['status'] = $request->status;
        $logo->update($input);
        if ($image = $request->file('cover')) {
            if ($logo->cover != null && File::exists('backend/img/logos/' . $logo->cover)) {
                unlink('backend/img/logos/' . $logo->cover);
            }
            $file_name = time() . "." . $image->getClientOriginalExtension();
            $path = public_path('backend/img/logos/' . $file_name);
            Image::make($image->getRealPath())->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $input['cover'] = $file_name;
            $logo->update($input);
        }

        return redirect()->route('admin.logos.index')->with([
            'message' => 'modification de logo site est bien reçu',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Logo  $logo
     * @return \Illuminate\Http\Response
     */
    public function destroy(Logo $logo)
    {
        return 'destroy';
    }

    public function remove_image(Request $request)
    {
        
        return true;
    }
}
