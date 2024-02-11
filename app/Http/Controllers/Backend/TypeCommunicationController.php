<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\TypeCommunicationRequest;
use App\Models\TypeCommunication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class TypeCommunicationController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $communications = TypeCommunication::select(
            'id',
            'type_comunication_' . LaravelLocalization::getCurrentLocale() . ' as type_communication',
            'link',
            'status',
            'updated_at'
        )->paginate('8');
        return view('backend.communication.index', compact('communications'));
    }


    public function create()
    {
        return view('backend.communication.create');
    }


    public function store(TypeCommunicationRequest $request)
    {
        $input['type_comunication_fr'] = $request->type_comunication_fr;
        $input['type_comunication_ar'] = $request->type_comunication_ar;
        $input['link'] = $request->link;
        $input['status'] = $request->status;
        $communication = TypeCommunication::create($input);
        if ($image = $request->file('cover')) {
            $file_name =  time() . '.' . $image->getClientOriginalExtension();
            $path = public_path('/backend/img/communications/' . $file_name);
            Image::make($image->getRealPath())->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $file_size = $image->getSize();
            $file_type = $image->getMimeType();
            $communication->media()->create([
                'name_file' => $file_name,
                'size_file' => $file_size,
                'type_file' => $file_type,
            ]);

            return redirect()->route('admin.type_communication.index')->with([
                'message' => 'creation de type communication est bien reçu',
                'alert-type' => 'success'
            ]);
        }
    }


    public function show(TypeCommunication $typeCommunication)
    {
        return 'show';
    }


    public function edit($communication_id)
    {
        $communication = TypeCommunication::findOrFail($communication_id);
        return view('backend.communication.edit', compact('communication'));
    }


    public function update(TypeCommunicationRequest $request, $communication_id)
    {
        $communication = TypeCommunication::findOrFail($communication_id);
        $input['type_comunication_fr'] = $request->type_comunication_fr;
        $input['type_comunication_ar'] = $request->type_comunication_ar;
        $input['link'] = $request->link;
        $input['status'] = $request->status;
        $communication->update($input);
        if ($image = $request->file('cover')) {
            if ($communication->firstMedia->name_file != null && File::exists('backend/img/communications/' . $communication->firstMedia->name_file)) {
                unlink('backend/img/communications/' . $communication->firstMedia->name_file);
            }
            $file_name = time() . "." . $image->getClientOriginalExtension();
            $path = public_path('backend/img/communications/' . $file_name);
            Image::make($image->getRealPath())->resize(500, null, function ($constraint) {
                $constraint->aspectRatio();
            })->save($path, 100);
            $file_size = $image->getSize();
            $file_type = $image->getMimeType();
            $communication->media()->update([
                'name_file' => $file_name,
                'size_file' => $file_size,
                'type_file' => $file_type,
            ]);
        }
        return redirect()->route('admin.type_communication.index')->with([
            'message' => 'modification de type de communication est bien reçu',
            'alert-type' => 'success'
        ]);
    }


    public function destroy($communication_id)
    {
        $communication = TypeCommunication::findOrFail($communication_id);
        if ($communication->firstMedia->name_file != null && File::exists('backend/img/communication/' . $communication->firstMedia->name_file)) {
            unlink('backend/img/communication/' . $communication->firstMedia->name_file);
        }
        $communication->delete();
        return redirect()->route('admin.type_communication.index')->with([
            'message' => 'suppression de type de communication est bien reçu',
            'alert-type' => 'danger'
        ]);
    }

    public function remove_image(Request $request)
    {
        return true;
    }
}
