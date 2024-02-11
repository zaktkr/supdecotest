@extends('layouts.master');

@section('content')
    <div class="row">
        <div class="col-12">
<div class="card">
    <div class="card-header mb-1">
        <h4 class="card-title">{{ __('message.List Des Menus') }}</h4>
        <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
    </div>
    <div class="card-content collapse show">
        <div class="table-responsive">
<table class="table table-striped">
    <thead>
        <tr>
            <th scope="col">{{ __('message.icon') }}</th>
            <th scope="col">{{ __('message.libelle') }}</th>
            <th scope="col">{{ __('message.statut') }}</th>
            <th scope="col">{{ __('message.Date de modification') }}</th>
            <th class="text-center" style="width: 30px;">{{ __('message.Opérations') }}</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($menus as $menu)
    <tr>
        <td>

    @if ($menu->icon != '' && File::exists('backend/img/menus/' . $menu->icon))
        <img src="{{ asset('backend/img/menus/' . $menu->icon) }}"
            class="img-thumbnail" width="150px" alt={{ $menu->icon }}>
    @else
        <img src="{{ asset('backend/img/menus/default/' . $menu->icon) }}"
            class="img-thumbnail" width="150px" alt={{ $menu->icon }}>
    @endif
</td>
    
<td>{{ $menu->name }}</td>
<td>
    @if ($menu->status === 1)
        <label class="badge badge-success">{{ $menu->status() }}</label>
    @else
        <label class="badge badge-danger">{{ $menu->status() }}</label>
    @endif
</td>
<td>{{ $menu->updated_at }}</td>
<td>
    <div class="btn-group btn-group">
        <a href="{{ route('admin.menus.edit', $menu->id) }}"
            class="btn btn-primary">
            <i class="fa fa-edit"></i>
        </a>
</td>
</tr>
@empty
    <tr>
        <td colspan="6" class="text-center">{{ __('message.Aucun Menu') }}</td>
    </tr>
@endforelse
</tbody>
<tfoot>
<tr>
    <td colspan="6">
        <div class="float-right">
            {!! $menus->links() !!}
        </div>
    </td>
</tr>
</tfoot>
</table>
</div>
                </div>
            </div>
        </div>
    </div>
@endsection
