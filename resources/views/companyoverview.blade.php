@extends('layouts.master')

@section('content')

    <table class="table">
        <thead class="thead-light">

        <tr>
            <th scope="col"></th>
            <th scope="col">Naam bedrijf</th>
            <th scope="col">Type</th>
            <th scope="col">Adres</th>
            <th scope="col">Telefoon</th>
            <th scope="col">Contact Person</th>
        </tr>

        </thead>
        <tbody>
{{--    Loading certain data belonging to the user / company        --}}
        <tr>
            <th scope="row"></th>
            <td>{{$users->name_company}}</td>
            <td>{{$users->type_company}}</td>
            <td>{{$users->address_company}}</td>
            <td>{{$users->phone}}</td>
            <td>{{$users->contact_person}}</td>
        </tr>


        </tbody>
    </table>

@endsection
