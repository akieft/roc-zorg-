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
        {{--        When clicking on a particular request, the corresponding id (and info) will be sent to the internship overview page.--}}
        @foreach($internships as $internship)
            <tr>
                <th scope="row"></th>
                <td>{{$internship->student_name}}</td>
                <td>{{$internship->company_name}}</td>
                <td> <a href="{{ url('/internship', $internship->id) }}">Accepteer</a></td>
            </tr>
        @endforeach
        </tbody>
    </table>
    {{--        When clicking on this button the user gets directed to the accepted requests from the assigned students--}}
    <div class="text-center">
    <a href="/internshipoverview"><button type="button" class="btn btn-secondary">Geaccepteerde verzoeken</button></a>
    </div>
@endsection
