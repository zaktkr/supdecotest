<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\AdminRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Str;
// use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;

class AdminController extends Controller
{

    public function __construct()
    {
        $this->middleware('supAdmin')->except('edit', 'update', 'destroy');
    }
    public function index()
    {
        if (Auth::user()->type === 1) {
            $admins = User::latest()->paginate('8');
            return view('backend.admins.index', compact('admins'));
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.admins.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(AdminRequest $request)
    {
        // return $request -> all();
        $input['name'] = $request->name;
        $input['email'] = $request->email;
        $input['password'] = bcrypt($request->password);

        //save img

        if ($image = $request->file('user_img')) {
            $file_name = Str::slug($request->name) . "." . $image->getClientOriginalExtension();
            $path = public_path('/backend/img/profile/' . $file_name);
            Image::make($image->getRealPath())->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $input['user_img'] = $file_name;
        }

        User::create($input);
        return redirect()->route('admin.admins.index')->with([
            'message' => 'creation de compte pour admin est bien reuçu',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        if (Auth::user()->id == $id) {
            $admin = User::findOrfail($id);
            return view('backend.admins.edit', compact('admin'));
        }
        return abort('404');
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(AdminRequest $request, $id)
    {
        $admin = User::findOrfail($id);

        $input['name'] = $request->name;
        $input['email'] = $request->email;
        $input['slug'] = null;

        if ($request->has('password')) {
            $input['password'] = bcrypt($request->password);
        }

        //save img

        if ($image = $request->file('user_img')) {

            if ($admin->user_img != null && File::exists('backend/img/profile/' . $admin->user_img)) {
                unlink('backend/img/profile/' . $admin->user_img);
            }

            $file_name = Str::slug($request->name) . "." . $image->getClientOriginalExtension();
            $path = public_path('/backend/img/profile/' . $file_name);
            Image::make($image->getRealPath())->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $input['user_img'] = $file_name;
        }

        $admin->update($input);

        return redirect()->route('admin.admins.index')->with([
            'message' => 'Modification de compte pour admin est bien reuçu',
            'alert-type' => 'success'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function  destroy($id)
    {
        $admin = User::findOrfail($id);

        if ($admin->user_img != null && File::exists('backend/img/profile/' . $admin->user_img)) {
            unlink('backend/img/profile/' . $admin->user_img);
        }
        $admin->delete();
        return redirect()->route('admin.admins.index')->with([
            'message' => 'supression avec succes',
            'alert-type' => 'success'
        ]);
    }
    public function remove_image(Request $request)
    {


        $admin = User::findOrfail($request->admin_id);

        if (File::exists('backend/img/profile/' . $admin->user_img)) {

            unlink('backend/img/profile/' . $admin->user_img);
            $admin->user_img = null;
            $admin->save();
        }
        return true;
    }
}
