@extends('layouts.master');
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header mb-1">
                    <h4 class="card-title">{{ __('message.List Des Services') }}</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="mb-0">
                            <a href="{{ route('admin.services.create') }}" class="btn btn-primary">
                                <span class="icon text-white-50">
                                    <i class="fa fa-plus"></i>
                                </span>
                                <span class="text">{{ __('message.Créer Nouveau Service') }} </span>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('message.Photo') }}</th>
                                    <th scope="col">{{ __('message.libelle') }}</th>
                                    <th scope="col">{{ __('message.description') }}</th>
                                    <th scope="col">{{ __('message.statut') }}</th>
                                    <th scope="col">{{ __('message.Date de modification') }}</th>
                                    <th scope="col" class="text-center" style="width: 30px;">
                                        {{ __('message.Opérations') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($services as $service)
                                    <tr>

                                        <td>

                                            @if ($service->firstMedia != '')
                                                <img src="{{ asset('backend/img/services/' . $service->firstMedia->name_file) }}"
                                                    class="img-thumbnail" width="150px" alt="photo">
                                            @else
                                                No img
                                            @endif
                                        </td>

                                        <td>{{ $service->name }}</td>
                                        <td>{!! $service->description !!}</td>
                                        <td>
                                            @if ($service->status === 1)
                                                <label class="badge badge-success">{{ $service->status() }}</label>
                                            @else
                                                <label class="badge badge-danger">{{ $service->status() }}</label>
                                            @endif
                                        </td>
                                        <td>{{ $service->updated_at }}</td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{ route('admin.services.edit', $service->id) }}"
                                                    class="btn btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="javascript:void(0);"
                                                    onclick="if(confirm('ete vous sur pour la supression')){
                                document.getElementById('delete_services{{ $service->id }}').submit();
                            }"
                                                    class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
                                            <form action="{{ route('admin.services.destroy', $service->id) }}"
                                                id="delete_services{{ $service->id }}" class="d-none" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">{{ __('message.Aucun Services') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6">
                                        <div class="float-right">
                                            {!! $services->links() !!}
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
