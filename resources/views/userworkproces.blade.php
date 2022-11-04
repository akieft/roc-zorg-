@extends('layouts.master')

@section('content')
<div class="container">
    <div class="mt30 container">
        <div class="row justify-content-center">
            <div class="col-md-8">
                <div class="card shadow p-3 mb-5 bg-white rounded">
                    <table class="table">
                        <thead>
                        <tr>
                            <!-- Table Head -->
                            <th class="table-head light-orange sub-dark-anthracite" scope="col">Werkproces toevoegen aan student</th>
                            <th class="table-head light-orange" scope="col"></th>
                        </tr>
                        </thead>
                    </table>
                    <form class="workproces-form" method="post" action="{{ route('userworkproces') }}">
                        @csrf
                        <label for="workproces">Workproces:</label><br>
                            <select name="work_process_id" id="userworkproces">
                                @foreach($workprocesses as $workproces)
                                    <option value="{{$workproces->id}}">{{$workproces->title}}</option>
                                @endforeach
                            </select>
                        <br><br>
                        <label for="student">Leerling</label><br>
                            <select name="user_id" id="student">
                                @foreach($students as $student)
                                    <option value="{{$student->id}}">{{$student->first_name}} {{$student->last_name}}</option>
                                @endforeach
                            </select>
                        <br><br>
                        <input type="Submit" class="btn btn-primary" placeholder="Opslaan">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
