@extends('layouts.master');

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header mb-1">
                    <h4 class="card-title">{{ __('message.list des Admins') }}</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="mb-0">
                            <a href="{{ route('admin.admins.create') }}" class="btn btn-primary">
                                <span class="icon text-white-50">
                                    <i class="fa fa-plus"></i>
                                </span>
                                <span class="text">{{ __('message.Créer nouveau Compte') }} </span>
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
                                    <th scope="col">{{ __('message.Nom et Prénom') }}</th>
                                    <th scope="col">{{ __('message.Email') }}</th>
                                    <th scope="col">{{ __('message.Date de modification') }}</th>
                                    <th scope="col" class="text-center" style="width: 30px;">
                                        {{ __('message.Opérations') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($admins as $admin)
                                    <tr>

                                        <td>

                                            @if ($admin->user_img != '')
                                                <img src="{{ asset('backend/img/profile/' . $admin->user_img) }}"
                                                    class="img-thumbnail" width="150px" alt="{{ $admin->name }}">
                                            @else
                                                No img
                                            @endif
                                        </td>

                                        <td>{{ $admin->name }}</td>
                                        <td>{{ $admin->email }}</td>

                                        <td>{{ $admin->updated_at }}</td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <a href="javascript:void(0);"
                                                    onclick="if(confirm('ete vous sur pour la supression')){
                    document.getElementById('delete_admins{{ $admin->id }}').submit();
                                         }"
                                                    class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
                                            <form action="{{ route('admin.admins.destroy', $admin->id) }}"
                                                id="delete_admins{{ $admin->id }}" class="d-none" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Aucun Admins</td>
                                    </tr>
                                @endforelse


                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6">
                                        <div class="float-right">
                                            {!! $admins->links() !!}
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
