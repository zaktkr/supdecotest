@extends('layouts.master');
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header mb-1">
                    <h4 class="card-title">{{ __('message.notre affaire') }}</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="mb-0">
                            <a href="{{ route('admin.notre_travail.create') }}" class="btn btn-primary">
                                <span class="icon text-white-50">
                                    <i class="fa fa-plus"></i>
                                </span>
                                <span class="text">{{ __('message.Créer Nouveau Travail') }} </span>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="container">
                    @include('partial.backend.flash')
                </div>
                <div class="card-content collapse show">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('message.description') }}</th>
                                    <th scope="col">{{ __('message.lien') }}</th>
                                    <th scope="col">{{ __('message.statut') }}</th>
                                    <th scope="col">{{ __('message.Date de modification') }}</th>
                                    <th scope="col" class="text-center" style="width: 30px;">
                                        {{ __('message.Opérations') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($notreTravailles as $notreTravail)
                                    <tr>
                                        <td>{!! $notreTravail->description !!}</td>
                                        <td><a href="{{ $notreTravail->link }}" target="_blank">{{ $notreTravail->link }}</a></td>
                                        <td>
                                            @if ($notreTravail->status === 1)
                                                <label class="badge badge-success">{{ $notreTravail->status() }}</label>
                                            @else
                                                <label class="badge badge-danger">{{ $notreTravail->status() }}</label>
                                            @endif
                                        </td>
                                        <td>{{ $notreTravail->updated_at }}</td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{ route('admin.notre_travail.edit', $notreTravail->id) }}"
                                                    class="btn btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="javascript:void(0);"
                                                    onclick="if(confirm('ete vous sur pour la supression')){
                                document.getElementById('delete_notre_travail{{ $notreTravail->id }}').submit();
                            }"
                                                    class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
                                            <form action="{{ route('admin.notre_travail.destroy', $notreTravail->id) }}"
                                                id="delete_notre_travail{{ $notreTravail->id }}" class="d-none"
                                                method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">{{ __('message.Pas d\'affaires') }}</td>
                                    </tr>
                                @endforelse
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6">
                                        <div class="float-right">
                                            {!! $notreTravailles->links() !!}
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
