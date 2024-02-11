<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\MenuRequest;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $menus = Menu::select(
            'id',
            'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
            'icon',
            'status',
            'updated_at'
        )->paginate('8');
        return view('backend.menus.index', compact('menus'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function show(Menu $menu)
    {
        return abort('404');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function edit($menu_id)
    {
        $menu = Menu::findOrFail($menu_id);
        return view('backend.menus.edit', compact('menu'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */
    public function update(MenuRequest $request, $menu_id)
    {
        $menu = Menu::findOrFail($menu_id);
        $input['name_fr'] = $request->name_fr;
        $input['name_ar'] = $request->name_ar;
        $input['status'] = $request->status;
        $menu->update($input);
        if ($image = $request->file('cover')) {
            if ($menu->icon != null && File::exists('backend/img/menus/' . $menu->icon)) {
                unlink('backend/img/menus/' . $menu->icon);
            }
            $file_name = time() . "." . $image->getClientOriginalExtension();
            $path = public_path('backend/img/menus/' . $file_name);
            Image::make($image->getRealPath())->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $input['icon'] = $file_name;
            $menu->update($input);
        }
        return redirect()->route('admin.menus.index')->with([
            'message' => 'modification est bien reçu',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Menu  $menu
     * @return \Illuminate\Http\Response
     */

    public function remove_image(Request $request)
    {

        return true;
    }
}
