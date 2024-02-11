@extends('layouts.master');

@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header mb-1">
                    <h4 class="card-title">{{ __('message.Logo') }}</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                </div>
                <div class="card-content collapse show">
                    <div class="table-responsive">
                        <table class="table table-striped">
                            <thead>
                                <tr>
                                    <th scope="col">{{ __('message.Photo') }}</th>
                                    <th scope="col">{{ __('message.statut') }}</th>
                                    <th scope="col">{{ __('message.Date de modification') }}</th>
                                    <th scope="col" class="text-center" style="width: 30px;">
                                        {{ __('message.Opérations') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($logos as $logo)
                                    <tr>

                                        <td>

                                            @if ($logo->status == true && $logo->cover != '' && File::exists('backend/img/logos/' . $logo->cover))
                                                <img src="{{ asset('backend/img/logos/' . $logo->cover) }}"
                                                    class="img-thumbnail" width="150px" alt="photo">
                                            @else
                                                <img src="{{ asset('backend/img/logos/default/defaultLogoRimPub.jpg') }}"
                                                    class="img-thumbnail" width="150px" alt="photo">
                                            @endif
                                        </td>

                                        <td>
                                            @if ($logo->status === 1)
                                                <label class="badge badge-success">{{ $logo->status() }}</label>
                                            @else
                                                <label class="badge badge-danger">{{ $logo->status() }}</label>
                                            @endif
                                        </td>
                                        <td>{{ $logo->updated_at }}</td>
                                        <td>
                                            <div class="btn-group btn-group">
                                                <a href="{{ route('admin.logos.edit', $logo->id) }}"
                                                    class="btn btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">Aucun Logos</td>
                                    </tr>
                                @endforelse


                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6">
                                        <div class="float-right">
                                            {!! $logos->links() !!}
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
