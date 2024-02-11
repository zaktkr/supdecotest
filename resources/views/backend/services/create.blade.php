@extends('layouts.master');
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header mb-1">
                    <h4 class="card-title">{{ __('message.Créer Nouveau Service') }}</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="mb-0">
                            <a href="{{ route('admin.services.index') }}" class="btn btn-primary">
                                <span class="icon text-white-50">
                                    <i class="fa fa-home"></i>
                                </span>
                                <span class="text">
                                    {{ __('message.Services') }}
                                </span>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="container">
                        <form class="form" action="{{ route('admin.services.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <h4 class="form-section"></h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name_fr">{{ __('message.libelle en français') }}</label>
                                            <input type="text" name="name_fr" value="{{ old('name_fr') }}"
                                                class="form-control">
                                            @error('name_fr')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name_ar">{{ __('message.libelle en arabe') }}</label>
                                            <input type="text" name="name_ar" value="{{ old('name_ar') }}"
                                                class="form-control">
                                            @error('name_ar')
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
                                            <label for="description_fr">{{ __('message.description en français') }}</label>
                                            <textarea name="description_fr" id="" cols="50" rows="5" class="form-control summernote">
                                {{ old('description_fr') }}
                            </textarea>
                                            @error('description_fr')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="description_ar">{{ __('message.description en arabe') }}</label>
                                            <textarea name="description_ar" id="" cols="50" rows="5" class="form-control summernote">
                                {{ old('description_ar') }}
                            </textarea>
                                            @error('description_ar')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="status">{{ __('message.statut') }}</label>
                                        <select name="status" class="form-control">
                                            <option value="1" {{ old('status') == 1 ? 'selected' : null }}>
                                                {{ __('message.activer') }}</option>
                                            <option value="0" {{ old('status') == 0 ? 'selected' : null }}>
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
                                        <label for="cover">{{ __('message.Photo') }}</label>
                                        <div class="file-loading">
                                            <input type="file" name="cover" class="file-input-overview"
                                                id="service-image">


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
                                    <i class="la la-check-square-o"></i> {{ __('message.Créer') }}
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
            $('#service-image').fileinput({
                theme: 'fas',
                maxFileCount: 1,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false,
            });



            $('.summernote').summernote({
                tabSize: 2,
                height: 200,
                toolbar: [
                    ['style', ['style']],
                    ['font', ['bold', 'underline', 'clear']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']]
                ]
            });
        });
    </script>

@stop
