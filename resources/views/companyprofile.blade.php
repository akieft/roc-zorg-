@extends('layouts.master')

@section('content')
    <div class="mt30 container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow p-3 mb-5 bg-white rounded">
                    <div class="dark-orange card-header sub-light-white">{{ __('Bewerk gegevens') }}</div>
                    {{--Scans if the user is logged in and if role is admin than you can access register--}}
                    @if(Auth::user()->hasRole('company'))
                        <div class="card-body">
                            <form method="post" action="/companyprofile">
                                @csrf

                                <div class="form-group row">
                                    <label for="phone-number" class="col-md-4 col-form-label text-md-right plat-dark-anthracite">{{ __('Telefoonnummer') }}</label>

                                    <div class="col-md-6">
                                        <input id="phone-number" type="text" class="form-control" name="phone" value="{{Auth::user()->phone}}" require>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="company-name" class="col-md-4 col-form-label text-md-right plat-dark-anthracite">{{ __('Naam Bedrijf') }}</label>

                                    <div class="col-md-6">
                                        <input id="company-name" type="text" class="form-control" name="name_company" value="{{Auth::user()->name_company}}" require>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="company-address" class="col-md-4 col-form-label text-md-right plat-dark-anthracite">{{ __('Adres Bedrijf') }}</label>

                                    <div class="col-md-6">
                                        <input id="company-address" type="text" class="form-control" name="address_company" value="{{Auth::user()->address_company}}" require>
                                    </div>
                                </div>

                                <div class="form-group row">
                                    <label for="company-type" class="col-md-4 col-form-label text-md-right plat-dark-anthracite">{{ __('Type Bedrijf') }}</label>

                                    <div class="col-md-6">
                                        <input id="company-type" type="text" class="form-control" name="type_company" value="{{Auth::user()->type_company}}" require>
                                    </div>
                                </div>

                                <div class="form-group row mb-0">
                                    <div class="col-md-6 offset-md-4">
                                        <button type="submit" class="btn btn-secondary">
                                            {{ __('Wijzig') }}
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
