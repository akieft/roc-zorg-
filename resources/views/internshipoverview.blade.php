@extends('layouts.master')

@section('content')

    <table class="table">
        <thead class="thead-light">

        <tr>
            <th scope="col"></th>
            <th scope="col">Naam student</th>
            <th scope="col">Naam bedrijf</th>
            <th scope="col">Acceptatie</th>
        </tr>
        </thead>

        <tbody>
        {{--        When clicking on a particular accepted request, the corresponding id (and info) will be sent back to the internship page.--}}
        @foreach($internships as $internship)
            <tr>
                <th scope="row"></th>
                <td>{{$internship->student_name}}</td>
                <td>{{$internship->company_name}}</td>
                <td> <a href="{{ url('/internshipoverview', $internship->id) }}">Ongedaan maken</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{--        When clicking on this button the user gets redirected to the not yet accepted requests--}}
    <div class="text-center">
    <a href="/internship"><button type="button" class="btn btn-secondary">Acceptatie verzoeken</button></a>
    </div>

@endsection
