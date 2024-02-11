@extends('layouts.master');

@section('content')
    <div class="card shadow mb-4">
        <div class="card-header py-3 d-flex">
            <h6 class="m-0 font-weight-bold text-primary">
                Créer nouveau Logo
            </h6>
            <div class="ml-auto">
                <a href="{{ route('admin.logos.index') }}" class="btn btn-primary">
                    <span class="icon text-white-50">
                        <i class="fa fa-home"></i>
                    </span>
                    <span class="text">
                        Logos
                    </span>
                </a>
            </div>
        </div>
        <div class="card-body">
            <form action="{{ route('admin.logos.store') }}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-12">
                        <div class="form-group">
                            <label for="status">Statut</label>
                            <select name="status" class="form-control">
                                <option value="1" {{ old('status') == 1 ? 'selected' : null }}>Activer</option>
                                <option value="0" {{ old('status') == 0 ? 'selected' : null }}>desactive</option>
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
                            <label for="cover">Photo</label>
                            <div class="file-loading">
                                <input type="file" name="cover"  class="file-input-overview" id="slider-image">


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
                    <button type="submit" name="submit" class="btn btn-primary">Créer</button>
                </div>

            </form>
        </div>
    </div>

@endsection
@section('script')
    <script>
        $(function() {
            $('#slider-image').fileinput({
                theme: 'fas',
                maxFileCount: 1,
                allowedFileTypes: ['image'],
                showCancel: true,
                showRemove: false,
                showUpload: false,
                overwriteInitial: false,
            });
        });
    </script>

@stop
