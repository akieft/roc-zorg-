@extends('layouts.master')

@section('content')
    <div class="mt30 container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow p-3 mb-5 bg-white rounded">
                    <div class="dark-orange card-header sub-light-white">{{ __('Registreer student') }}</div>
{{--Scans if the user is logged in and if role is admin than you can access register--}}
                    @if(Auth::user()->hasRole('teacher'))
                        <div class="card-body">
                            <form method="post" action="/docentregister">
                                @csrf
                                <div class="form-group row">
                                    <label for="name" class="col-md-4 col-form-label text-md-right plat-dark-anthracite">{{ __('Voornaam') }}</label>

                                    <div class="col-md-6">
                                        <input id="name" type="text" class="form-control" name="first_name">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="lastname" class="col-md-4 col-form-label text-md-right plat-dark-anthracite">{{ __('Achternaam') }}</label>

                                    <div class="col-md-6">
                                        <input id="lastname" type="text" class="form-control" name="last_name">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="email" class="col-md-4 col-form-label text-md-right plat-dark-anthracite">{{ __('E-mail') }}</label>

                                    <div class="col-md-6">
                                        <input id="email" type="email" class="form-control" name="email">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="phone-number" class="col-md-4 col-form-label text-md-right plat-dark-anthracite">{{ __('Telefoonnummer') }}</label>

                                    <div class="col-md-6">
                                        <input id="phone-number" type="text" class="form-control" name="phone">
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="education" class="col-md-4 col-form-label text-md-right plat-dark-anthracite">{{ __('Opleiding') }}</label>

                                    <div class="col-md-6">
                                        <input id="education" type="text" class="form-control" name="study">
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-secondary">
                                            {{ __('Registreer') }}
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
