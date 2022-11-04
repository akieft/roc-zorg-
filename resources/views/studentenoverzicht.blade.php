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
            </tr>

        </thead>

        <tbody>
        @if(Auth::user()->hasRole('teacher, admin'))
{{--        When clicking on a particular student, the corresponding id (and info) will be sent to the student overview page.--}}
            @foreach($users as $user)
                <tr>
                    <th scope="row"></th>
                    <form id="form-{{$user->id}}" method="post" action="/studentoverzicht">
                        @csrf
                        <input type="hidden" value="{{$user->id}}" name="student">
                        <td><a href="javascript:{}" onclick="document.getElementById('form-{{$user->id}}').submit(); return false;">{{$user->first_name}}</a></td>
                    </form>
    {{--        Loading certain data belonging to the user / student--}}
                    <td>{{$user->last_name}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->phone}}</td>

                </tr>
            @endforeach
        @elseif(Auth::user()->hasRole('company'))

{{--        When clicking on a particular student, the corresponding id (and info) will be sent to the student overview page.--}}
            @foreach($students as $student)
                <tr>
                    <th scope="row"></th>
                    <form id="form-{{$student->id}}" method="post" action="/studentoverzicht">
                        @csrf
                        <input type="hidden" value="{{$student->id}}" name="student">
                        <td><a href="javascript:{}" onclick="document.getElementById('form-{{$student->id}}').submit(); return false;">{{$student->first_name}}</a></td>
                    </form>
    {{--        Loading certain data belonging to the user / student--}}
                    <td>{{$student->last_name}}</td>
                    <td>{{$student->email}}</td>
                    <td>{{$student->phone}}</td>

                    </tr>
            @endforeach
        @endif
        </tbody>
    </table>

@endsection
