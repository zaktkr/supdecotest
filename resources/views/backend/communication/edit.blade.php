@extends('layouts.master');

@section('content')
    {{-- <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">
                {{ __('message.modifier Methode de communication') }}
            </h6>
            <div class="ml-auto">
                <a href="{{ route('admin.type_communication.index') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">
                        {{ __('message.Methodes des communications') }}
                    </span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.type_communication.update', $communication->id) }}" method="post"
                enctype="multipart/form-data">
                @csrf
                @method('PATCH')
                <div class="row">

                    <div class="col-6">
                        <div class="form-group">
                            <label for="type_comunication_fr">{{__('message.methode de communication en français')}}</label>
                            <input type="text" name="type_comunication_fr"
                                value="{{ old('type_comunication_fr', $communication->type_comunication_fr) }}"
                                class="form-control">
                            @error('type_comunication_fr')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="type_comunication_ar">{{__('message.methode de communication en arabe')}}</label>
                            <input type="text" name="type_comunication_ar"
                                value="{{ old('type_comunication_ar', $communication->type_comunication_ar) }}"
                                class="form-control">
                            @error('type_comunication_ar')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="link">{{__('message.lien')}}</label>
                            <input type="text" name="link" value="{{ old('link', $communication->link) }}"
                                class="form-control">
                            @error('link')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-6">
                        <div class="form-group">
                            <label for="status">{{__('message.statut')}}</label>
                            <select name="status" class="form-control">
                                <option value="1" {{ old('status', $communication->status) == 1 ? 'selected' : null }}>
                                    {{__('message.activer')}}
                                </option>
                                <option value="0" {{ old('status', $communication->status) == 0 ? 'selected' : null }}>
                                    {{__('message.desactiver')}}</option>
                            </select>
                            @error('status')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>

                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="cover">{{__('message.Photo')}}</label>
                            <div class="file-loading">
                                <input type="file" name="cover" class="file-input-overview" id="communication-icon">


                            </div>
                            @error('cover')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                        </div>
                    </div>
                </div>





                <div class="form-group pt-4">
                    <button type="submit" name="submit" class="btn btn-primary">{{__('message.Modifier')}}</button>
                </div>

            </form>
        </div>
    </div> --}}
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header mb-1">
                    <h4 class="card-title">{{ __('message.Créer Nouveau methode de Communication') }}</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="mb-0">
                            <a href="{{ route('admin.type_communication.index') }}" class="btn btn-primary">
                                <span class="icon text-white-50">
                                    <i class="fa fa-home"></i>
                                </span>
                                <span class="text">
                                    {{__('message.list des methodes des Communications')}}
                                </span>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="container">
                        <form class="form" action="{{ route('admin.type_communication.update', $communication->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-body">
                                <h4 class="form-section"></h4>
                                <div class="row">
                                    <div class="col-md-6">
                                    <div class="form-group">
                            <label for="type_comunication_fr">{{__('message.methode de communication en français')}}</label>
                            <input type="text" name="type_comunication_fr"  value="{{ old('type_comunication_fr', $communication->type_comunication_fr) }}" class="form-control">
                            @error('type_comunication_fr')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="type_comunication_ar">{{__('message.methode de communication en arabe')}}</label>
                            <input type="text" name="type_comunication_ar" value="{{ old('type_comunication_ar', $communication->type_comunication_ar) }}" class="form-control">
                            @error('type_comunication_ar')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="link">{{__('message.lien')}}</label>
                                            <input type="text" name="link" value="{{ old('link',$communication->link) }}" class="form-control" placeholder="https://...">
                                            @error('link')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <label for="status">{{ __('message.statut') }}</label>
                                        <select name="status" class="form-control">
                                            <option value="1" {{ old('status',$communication->status) == 1 ? 'selected' : null }}>
                                                {{ __('message.activer') }}</option>
                                            <option value="0" {{ old('status',$communication->status) == 0 ? 'selected' : null }}>
                                                {{ __('message.desactiver') }}</option>
                                        </select>
                                        @error('status')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="cover">{{__('message.Photo')}}</label>
                            <div class="file-loading">
                                <input type="file" name="cover" class="file-input-overview" id="communication-icon">


                            </div>
                            @error('cover')
                                <span class="text-danger">
                                    {{ $message }}
                                </span>
                            @enderror
                                    </div>
                                </div>
                            </div>
                            <div class="form-actions">
                                <button type="button" class="btn btn-warning mr-1">
                                    <i class="ft-x"></i> {{__('message.Annuler')}}
                                </button>
                                <button type="submit" class="btn btn-primary">
                                    <i class="la la-check-square-o"></i> {{__('message.Modifier')}}
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(function() {
            $("#communication-icon").fileinput({
                theme: "fas",
                maxFileCount: 1,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false,
                initialPreview: [
                    "{{ asset('backend/img/communications/' . $communication->firstMedia->name_file) }}"
                ],
                initialPreviewAsData: true,
                initialPreviewFileTypes: 'image',
                initialPreviewConfig: [

                    {
                        caption: "{{ $communication->firstMedia->name_file }}",
                        size: '1111',
                        width: "120px",
                        url: "{{ route('admin.type_communication.remove-image', ['communication_id' => $communication->id, '_token' => csrf_token()]) }}",
                        key: {{ $communication->id }}
                    }

                ]
            });

        });
    </script>
@stop
