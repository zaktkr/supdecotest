@extends('layouts.master');
@section('content')
<div class="row">
    <div class="col-12">
        <div class="card">
            <div class="card-header mb-1">
                <h4 class="card-title">{{ __('message.Modifier Travail') }}</h4>
                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                <div class="heading-elements">
                    <ul class="mb-0">
                        <a href="{{ route('admin.notre_travail.index') }}" class="btn btn-primary">
                            <span class="icon text-white-50">
                                <i class="fa fa-home"></i>
                            </span>
                            <span class="text">
                                {{ __('message.notre affaire') }}
                            </span>
                        </a>
                    </ul>
                </div>
            </div>
            <div class="card-content collapse show">
                <div class="container">
                    <form class="form" action="{{ route('admin.notre_travail.update',$notreTravail->id) }}" method="post"
                        enctype="multipart/form-data">
                        @csrf
                        @method('PATCH')
                        <div class="form-body">
                            <h4 class="form-section"></h4>
                            <div class="row">
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="link">{{ __('message.lien') }}</label>
                                        <input type="text" name="link" value="{{ old('link',$notreTravail->link) }}"
                                            class="form-control" placeholder="https://...">
                                        @error('link')
                                            <span class="text-danger">
                                                {{ $message }}
                                            </span>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="status">{{ __('message.statut') }}</label>
                                        <select name="status" class="form-control">
                                            <option value="1" {{ old('status',$notreTravail->status) == 1 ? 'selected' : null }}>
                                                {{ __('message.activer') }}</option>
                                            <option value="0" {{ old('status',$notreTravail->status) == 0 ? 'selected' : null }}>
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
                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label for="description_fr">{{ __('message.description en français') }}</label>
                                        <textarea name="description_fr" id="" cols="50" rows="5" class="form-control summernote">
                            {{ old('description_fr',$notreTravail->description_fr) }}
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
                            {{ old('description_ar',$notreTravail->description_ar) }}
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
                        <div class="form-actions">
                            <button type="button" class="btn btn-warning mr-1">
                                <i class="ft-x"></i> {{__('message.Annuler')}}
                            </button>
                            <button type="submit" class="btn btn-primary">
                                <i class="la la-check-square-o"></i> {{ __('message.Modifier') }}
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
