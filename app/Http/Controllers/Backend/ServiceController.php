<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\ServiceRequest;
use App\Models\Service;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class ServiceController extends Controller
{

  public function index()
  {
    $services = Service::select(
      'id',
      'name_' . LaravelLocalization::getCurrentLocale() . ' as name',
      'description_' . LaravelLocalization::getCurrentLocale() . ' as description',
      'status',
      'updated_at'
    )->paginate('8');
    return view('backend.services.index', compact('services'));
  }


  public function create()
  {
    return view('backend.services.create');
  }


  public function store(ServiceRequest $request)
  {
    // return $request;
    $input['name_fr'] = $request->name_fr;
    $input['name_ar'] = $request->name_ar;
    $input['description_fr'] = $request->description_fr;
    $input['description_ar'] = $request->description_ar;
    $input['status'] = $request->status;
    $service = Service::create($input);
    if ($image = $request->file('cover')) {
      $file_name =  time() . '.' . $image->getClientOriginalExtension();
      $path = public_path('/backend/img/services/' . $file_name);
      Image::make($image->getRealPath())->resize(500, null, function ($constraint) {
        $constraint->aspectRatio();
      })->save($path, 100);
      $file_size = $image->getSize();
      $file_type = $image->getMimeType();
      $service->media()->create([
        'name_file' => $file_name,
        'size_file' => $file_size,
        'type_file' => $file_type,
      ]);

      return redirect()->route('admin.services.index')->with([
        'message' => 'creation de service est bien reçu',
        'alert-type' => 'success'
      ]);
    }
  }


  public function show(Service $service)
  {
    //
  }


  public function edit($service_id)
  {
    $service = Service::findOrFail($service_id);
    return view('backend.services.edit', compact('service'));
  }


  public function update(ServiceRequest $request, $service_id)
  {

    $service = Service::findOrFail($service_id);
    $input['name_fr'] = $request->name_fr;
    $input['name_ar'] = $request->name_ar;
    $input['description_fr'] = $request->description_fr;
    $input['description_ar'] = $request->description_ar;
    $input['status'] = $request->status;
    $service->update($input);
    if ($image = $request->file('cover')) {
      if ($service->firstMedia->name_file != null && File::exists('backend/img/services/' . $service->firstMedia->name_file)) {
        unlink('backend/img/services/' . $service->firstMedia->name_file);
      }
      $file_name = time() . "." . $image->getClientOriginalExtension();
      $path = public_path('backend/img/services/' . $file_name);
      Image::make($image->getRealPath())->resize(500, null, function ($constraint) {
        $constraint->aspectRatio();
      })->save($path, 100);
      $file_size = $image->getSize();
      $file_type = $image->getMimeType();
      $service->media()->update([
        'name_file' => $file_name,
        'size_file' => $file_size,
        'type_file' => $file_type,
      ]);
    }
    return redirect()->route('admin.services.index')->with([
      'message' => 'modification de service est bien reçu',
      'alert-type' => 'success'
    ]);
  }


  public function destroy($service_id)
  {
    $service = Service::findOrFail($service_id);
    if ($service->firstMedia->name_file != null && File::exists('backend/img/services/' . $service->firstMedia->name_file)) {
      unlink('backend/img/services/' . $service->firstMedia->name_file);
    }
    $service->delete();
    return redirect()->route('admin.services.index')->with([
      'message' => 'suppression de service est bien reçu',
      'alert-type' => 'danger'
    ]);
  }


  public function remove_image(Request $request)
  {
    return true;
  }
}
