@extends('layouts.master')

@section('content')

    <!-- form hour register -->
    <div class="mt30 mb30 container">
        <div class="row">
            <div class="col-md-6">
                @if ((Auth::user()->hasRole('student')))
                            <div class="card shadow p-3 mb-5 bg-white rounded">
                                {{--Scans if the user is logged in and if role is admin than you can access register--}}
                                <div class="card-body">
                                    <form class="form-hour" method="post" action="hour">
                                        @csrf
                                        <div class="form-group">
                                            <label for="formGroupExampleInput" class="sub-dark-anthracite">Datum</label>
                                            <input type="date" class="form-control" name="calendar" id="Calendar" placeholder="Datum" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput2" class="sub-dark-anthracite">Aanwezig</label>
                                            <input type="number" step="any" value="0" class="form-control" name="present" id="Present" placeholder="Uren aanwezig" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput" class="sub-dark-anthracite">Afwezig</label>
                                            <input type="number" step="any" value="0" class="form-control" name="absent" id="Absent" placeholder="Uren afwezig" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput2" class="sub-dark-anthracite">Ziek</label>
                                            <input type="number" step="any" value="0" class="form-control" name="sick" id="Sick" placeholder="Uren ziek" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="formGroupExampleInput2" class="sub-dark-anthracite">School</label>
                                            <input type="number" step="any" value="0" class="form-control" name="school" id="School" placeholder="Uren school" required>
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
                            </div>


                @endif

            </div>
            <!-- table date hour register -->
            <div class="col-md-6">
                <table class="table">
                    <thead class="thead-light">
                    <tr>
                        <th class="plat-dark-anthracite-bold" scope="col">Student</th>
                        <th class="plat-dark-anthracite-bold" scope="col">Datum</th>
                        <th class="plat-dark-anthracite-bold" scope="col">Aanwezig</th>
                        <th class="plat-dark-anthracite-bold" scope="col">Afwezig</th>
                        <th class="plat-dark-anthracite-bold" scope="col">Ziek</th>
                        <th class="plat-dark-anthracite-bold" scope="col">School</th>
                    </tr>
                    </thead>
                    <tbody>

                    @foreach ($hours as $hour)
                        <tr>
                            <th scope="row" class="light-orange">{{$current->first_name}}</th>
                            <td class="light-orange"> {{ date('d-m-Y', strtotime($hour->calendar))}}</td>
                            <td class="light-orange">{{$hour->present}}</td>
                            <td class="light-orange">{{$hour->absent}}</td>
                            <td class="light-orange">{{$hour->sick}}</td>
                            <td class="light-orange">{{$hour->school}}</td>
                        </tr>

                    @endforeach
                    <th scope="row" class="plat-dark-anthracite-bold">Total</th>
                    <td class="plat-dark-anthracite-bold"></td>
                    <td class="plat-dark-anthracite-bold">{{$totalPresent}}</td>
                    <td class="plat-dark-anthracite-bold">{{$totalAbsent}}</td>
                    <td class="plat-dark-anthracite-bold">{{$totalSick}}</td>
                    <td class="plat-dark-anthracite-bold">{{$totalSchool}}</td>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

@endsection
