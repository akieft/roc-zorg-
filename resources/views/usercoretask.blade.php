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
                            <th class="table-head light-orange sub-dark-anthracite" scope="col">Kerntaak toevoegen aan leerling</th>
                            <th class="table-head light-orange" scope="col"></th>
                        </tr>
                        </thead>
                    </table>
                    <form class="usercoretask-form" method="post" action="{{ route('usercoretask') }}">
                        @csrf
                        <label for="usercoretask">Kerntaak:</label><br>
                            <select name="core_task_id" id="usercoretask">
                                @foreach($coretasks as $coretask)
                                    <option value="{{$coretask->id}}">{{$coretask->title}}</option>
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
