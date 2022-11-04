@extends('layouts.master')

@section('content')
<div class="container">
    <table class="table">
        <thead>
        <tr>
            <!-- Table Head -->
            <th class="table-head light-orange sub-dark-anthracite" scope="col">Werkprocessen</th>
            <th class="table-head light-orange" scope="col"></th>
        </tr>
        </thead>
    </table>
    <table class="table table-bordered border-primary">
        <thead>
        <tr>
            <th scope="col">Student</th>
            <th scope="col">Werkproces</th>
            <th scope="col">Beschrijving</th>
            <th scope="col">Klaar?</th>
            <th scope="col">Kerntaak</th>
        </tr>
        </thead>
        <tbody>
        @foreach($finals as $final)
        <tr>
            <td>{{$final['first_name']}} {{$final['last_name']}}</td>
            <td> <a href="{{ url('/studentcompetenceoverview', $final['work_process_id']) }}">{{$final['work_process_title']}}</td>
            <td>{{$final['work_process_description']}}</td>
            @if($final['done'] == 0)
                <td class="donex"></td>
            @elseif($final['done'] == 1)
                <td class="donev"></td>
            @endif
            <td> <a href="{{ url('/studentcoretaskoverview', $final['core_task_id']) }}">{{$final['core_task_title']}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
