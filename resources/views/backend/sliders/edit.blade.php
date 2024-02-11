@extends('layouts.master');
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header mb-1">
                    <h4 class="card-title">{{ __('message.modifier Photo Animation') }}</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="mb-0">
                            <a href="{{ route('admin.sliders.index') }}" class="btn btn-primary">
                                <span class="icon text-white-50">
                                    <i class="fa fa-home"></i>
                                </span>
                                <span class="text">
                                    {{ __('message.Photo Animation') }}
                                </span>
                            </a>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="container">
                        <form class="form" action="{{ route('admin.sliders.update', $slider->id) }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PATCH')
                            <div class="form-body">
                                <h4 class="form-section"></h4>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="form-group">
                                            <label for="status">{{ __('message.statut') }}</label>
                                            <select name="status" class="form-control">
                                                <option value="1"
                                                    {{ old('status', $slider->status) == 1 ? 'selected' : null }}>
                                                    {{ __('message.activer') }}
                                                </option>
                                                <option value="0"
                                                    {{ old('status', $slider->status) == 0 ? 'selected' : null }}>
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
                                <div class="form-group">
                                    <label for="cover">{{ __('message.Photo') }}</label>
                                    <div class="file-loading">
                                        <input type="file" name="cover" class="file-input-overview" id="slider-image">


                                    </div>
                                    @error('cover')
                                        <span class="text-danger">
                                            {{ $message }}
                                        </span>
                                    @enderror
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
    </div>
@endsection
@section('script')
    <script>
        $(function() {
            $("#slider-image").fileinput({
                theme: "fas",
                maxFileCount: 1,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false,
                initialPreview: ["{{ asset('backend/img/sliders/' . $slider->firstMedia->name_file) }}"],
                initialPreviewAsData: true,
                initialPreviewFileTypes: 'image',
                initialPreviewConfig: [

                    {
                        caption: "{{ $slider->firstMedia->name_file }}",
                        size: '1111',
                        width: "120px",
                        url: "{{ route('admin.sliders.remove-image', ['slider_id' => $slider->id, '_token' => csrf_token()]) }}",
                        key: {{ $slider->id }}
                    }

                ]
            });
        });
    </script>
@stop
