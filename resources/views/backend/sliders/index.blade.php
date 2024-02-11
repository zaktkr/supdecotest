@extends('layouts.master');
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header mb-1">
                    <h4 class="card-title">{{ __('message.List des Photos Animations') }}</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="mb-0">
                            <a href="{{ route('admin.sliders.create') }}" class="btn btn-primary">
                                <span class="icon text-white-50">
                                    <i class="fa fa-plus"></i>
                                </span>
                                <span class="text">{{ __('message.Créer Nouveau Photo Animation') }}</span>
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
                                    <th scope="col">{{ __('message.statut') }}</th>
                                    <th scope="col">{{ __('message.Date de modification') }}</th>
                                    <th scope="col" class="text-center" style="width: 30px;">
                                        {{ __('message.Opérations') }}</th>
                                </tr>
                            </thead>
                            <tbody>
                                @forelse ($sliders as $slider)
                                    <tr>

                                        <td>

                                            @if ($slider->firstMedia != '')
                                                <img src="{{ asset('backend/img/sliders/' . $slider->firstMedia->name_file) }}"
                                                    class="img-thumbnail" width="150px" alt="photo">
                                            @else
                                                No img
                                            @endif
                                        </td>

                                        <td>
                                            @if ($slider->status === 1)
                                                <label class="badge badge-success">{{ $slider->status() }}</label>
                                            @else
                                                <label class="badge badge-danger">{{ $slider->status() }}</label>
                                            @endif

                                        </td>
                                        <td>{{ $slider->updated_at }}</td>
                                        <td>
                                            <div class="btn-group btn-group-sm">
                                                <a href="{{ route('admin.sliders.edit', $slider->id) }}"
                                                    class="btn btn-primary">
                                                    <i class="fa fa-edit"></i>
                                                </a>
                                                <a href="javascript:void(0);"
                                                    onclick="if(confirm('ete vous sur pour la supression')){
                                        document.getElementById('delete_sliders{{ $slider->id }}').submit();
                                    }"
                                                    class="btn btn-danger">
                                                    <i class="fa fa-trash"></i>
                                                </a>
                                            </div>
                                            <form action="{{ route('admin.sliders.destroy', $slider->id) }}"
                                                id="delete_sliders{{ $slider->id }}" class="d-none" method="post">
                                                @csrf
                                                @method('DELETE')
                                            </form>
                                        </td>
                                    </tr>
                                @empty
                                    <tr>
                                        <td colspan="6" class="text-center">{{ __('message.Aucun Photo Animation') }}
                                        </td>
                                    </tr>
                                @endforelse

                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="6">
                                        <div class="float-right">
                                            {!! $sliders->links() !!}
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
