@extends('layouts.master')

@section('content')


    <table class="table">
        <thead class="thead-light">

            <tr>
                <th scope="col"></th>
                <th scope="col">Naam bedrijf</th>
                <th scope="col">Type</th>
                <th scope="col">Adres</th>
                @if(Auth::user()->hasRole('student'))
                    <th scope="col">Aanmelden</th>
                @endif
            </tr>
        </thead>

        <tbody>
{{--        When clicking on a particular company, the corresponding id (and info) will be sent to the company overview page.--}}
        @foreach($companies as $company)
            <tr>
                <th scope="row"></th>

                <form id="form-{{$company->id}}" method="post" action="/companyoverview">
                 @csrf
                 <input type="hidden" value="{{$company->id}}" name="company">
                 <td><a href="javascript:{}" onclick="document.getElementById('form-{{$company->id}}').submit();return false;">{{$company->name_company}}</a></td>
                </form>
                <td>{{$company->type_company}}</td>
                <td>{{$company->address_company}}</td>
                @if(Auth::user()->hasRole('student'))
                    <td>
                        <a href="{{ url('/companiesoverview', $company->id) }}">Stageverzoek</a>
                    </td>
                @endif
            </tr>
        @endforeach
        </tbody>
    </table>

@endsection
