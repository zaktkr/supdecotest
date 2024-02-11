@extends('layouts.master');
@section('content')
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-header mb-1">
                    <h4 class="card-title">{{ __('message.Créer compte pour Admin') }}</h4>
                    <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="mb-0">
                                <a href="{{ route('admin.admins.index') }}" class="btn btn-primary">
                                    <span class="icon text-white-50">
                                        <i class="fa fa-home"></i>
                                    </span>
                                    <span class="text">
                                        {{ __('message.Admins') }}
                                    </span>
                                </a>
                        </ul>
                    </div>
                </div>
                <div class="card-content collapse show">
                    <div class="container">
                        <form class="form" action="{{ route('admin.admins.store') }}" method="post"
                            enctype="multipart/form-data">
                            @csrf
                            <div class="form-body">
                                <h4 class="form-section"></h4>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="name">{{ __('message.Nom et Prénom') }}</label>
                                            <input type="text" name="name" value="{{ old('name') }}"
                                                class="form-control" placeholder="{{ __('message.Nom et Prénom') }}">
                                            @error('name')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="email">{{ __('message.Email') }}</label>
                                            <input type="email" name="email" value="{{ old('email') }}"
                                                class="form-control" placeholder="{{ __('message.Email') }}">
                                            @error('email')
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
                                            <label for="user_img">{{ __('message.Photo') }}</label>
                                            <div class="file-loading">
                                                <input type="file" name="user_img" class="file-input-overview"
                                                    id="admin-image">

                                                @error('user_img')
                                                    <span class="text-danger">
                                                        {{ $message }}
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label for="password">{{ __('message.Mot de passe') }}</label>
                                            <input type="password" name="password" value="{{ old('password') }}"
                                                class="form-control" placeholder="{{ __('message.Mot de passe') }}">
                                            @error('password')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="form-group">
                                            <label
                                                for="password_confirmation">{{ __('message.Confirmer Mot de passe') }}</label>
                                            <input type="password" name="password_confirmation"
                                                value="{{ old('password_confirmation') }}" class="form-control"
                                                placeholder="{{ __('message.Confirmer Mot de passe') }}">
                                            @error('password_confirmation')
                                                <span class="text-danger">
                                                    {{ $message }}
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="form-actions">
                                    <a href="{{ route('admin.index') }}" class="btn btn-warning mr-1">
                                        <i class="ft-x"></i>{{__('message.Annuler')}}
                                    </a>
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
        </div>
@endsection
@section('script')
    <script>
        $(function() {
            $('#admin-image').fileinput({
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
