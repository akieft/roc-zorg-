@extends('layouts.master')

@section('content')
    <main class="container">

        <!-- If user has role teacher to see the page -->
        @if ($user->hasRole('teacher'))

        <!-- form to add student to coach list table -->
        <div class="row">
                <div class="mt30 row col-md-8 justify-content-center">
                    <div class="col-md-8">
                        <div class="card shadow p-3 mb-5 bg-white rounded">
                            <div class="dark-orange card-header sub-light-white">{{ __('Registreer student') }}</div>
                            {{--Scans if the user is logged in and if role is admin than you can access register--}}
                            @if(Auth::user()->hasRole('teacher'))
                                <div class="card-body">
                                    <form action="/coach" method="post" class="form-container card-body">
                                        @csrf
                                        <div class="form-group row">
                                            <label for="exampleFormControlSelect1" class="col-md-4 col-form-label text-md-right plat-dark-anthracite">Student</label>

                                            <div class="col-md-6">
                                                <select name="student_id" class="form-control" id="exampleFormControlSelect1">
                                                    @foreach($students as $student)
                                                        <option value="{{$student->id}}">{{$student->first_name}} {{$student->last_name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-0">
                                            <div class="col-md-6 offset-md-4">
                                                <button type="submit" class="btn btn-secondary">
                                                    {{ __('Voeg toe') }}
                                                </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            @endif
                        </div>
                    </div>
                </div>

            <!--Table coach with the students he coach -->
            <div class="col-md-4 container-tablecoach">
                <h3 class="sub-anthracite">Docent: {{$user->first_name}} {{$user->last_name}}</h3>
                <table class="table">
                    <thead class="light-orange">
                        <tr>
                            <th class="plat-dark-anthracite-bold" scope="col">Naam student</th>
                            <th class="plat-dark-anthracite-bold" scope="col">Telefoonnummer</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($mystudents as $mystudent)
                        <tr>
                            <th scope="row">{{$mystudent->first_name}} {{$mystudent->last_name}}</th>
                            <td>{{$mystudent->phone}}</td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>
        @endif
    </main>
@endsection
