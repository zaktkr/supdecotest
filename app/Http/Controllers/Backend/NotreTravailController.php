<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use App\Http\Requests\Backend\NotreTravailRequest;
use App\Models\NotreTravail;
use Illuminate\Http\Request;
use Mcamara\LaravelLocalization\Facades\LaravelLocalization;

class NotreTravailController extends Controller
{

    public function index()
    {
        $notreTravailles = NotreTravail::select(
            'id',
            'description_' . LaravelLocalization::getCurrentLocale() . ' as description',
            'link',
            'status',
            'updated_at'
        )->paginate('8');
        return view('backend.notreTravail.index', compact('notreTravailles'));
    }


    public function create()
    {
        return view('backend.notreTravail.create');
    }


    public function store(NotreTravailRequest $request)
    {
        $input['link'] = $request->link;
        $input['description_fr'] = $request->description_fr;
        $input['description_ar'] = $request->description_ar;
        $input['status'] = $request->status;
        $notreTravail = NotreTravail::create($input);
        return redirect()->route('admin.notre_travail.index')->with([
            'message' => 'creation de travail est bien reçu',
            'alert-type' => 'success'
        ]);
    }


    public function show(NotreTravail $notreTravail)
    {
        //
    }


    public function edit($notreTravail_id)
    {
        $notreTravail = NotreTravail::findOrFail($notreTravail_id);
        return view('backend.notreTravail.edit', compact('notreTravail'));
    }


    public function update(NotreTravailRequest $request, $notreTravail_id)
    {
        $notreTravail = NotreTravail::findOrFail($notreTravail_id);
        $input['link'] = $request->link;
        $input['description_fr'] = $request->description_fr;
        $input['description_ar'] = $request->description_ar;
        $input['status'] = $request->status;
        $notreTravail->update($input);
        return redirect()->route('admin.notre_travail.index')->with([
            'message' => 'modification de travail est bien reçu',
            'alert-type' => 'success'
        ]);
    }


    public function destroy($notreTravail_id)
    {
        $notreTravail = NotreTravail::findOrFail($notreTravail_id);
        $notreTravail->delete();
        return redirect()->route('admin.notre_travail.index')->with([
            'message' => 'suppression de travail est bien reçu',
            'alert-type' => 'danger'
        ]);
    }
}
