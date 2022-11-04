@extends('layouts.master')

@section('content')

    <table class="table">
        <thead class="thead-light">

        <tr>
            <th scope="col"></th>
            <th scope="col">Naam</th>
            <th scope="col">Achternaam</th>
            <th scope="col">email</th>
            <th scope="col">Telefoon</th>
            <th scope="col">Contact Person</th>
        </tr>

        </thead>
        <tbody>
        {{--    Loading certain data belonging to the user / student        --}}
        <tr>
            <th scope="row"></th>
            <td>{{$users->first_name}}</td>
            <td>{{$users->last_name}}</td>
            <td>{{$users->email}}</td>
            <td>{{$users->phone}}</td>
            <td>{{$users->contact_person}}</td>
        </tr>


        </tbody>
    </table>

@endsection
