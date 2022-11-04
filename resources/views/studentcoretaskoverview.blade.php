@extends('layouts.master')

@section('content')
<div class="container">
    <table class="table">
        <thead>
        <tr>
            <!-- Table Head -->
            <th class="table-head light-orange sub-dark-anthracite" scope="col">Kerntaken</th>
            <th class="table-head light-orange" scope="col"></th>
        </tr>
        </thead>
    </table>
    <table class="table table-bordered border-primary">
        <thead>
        <tr>
            <th scope="col">Student</th>
            <th scope="col">Kerntaak</th>
            <th scope="col">Beschrijving</th>
            <th scope="col">Klaar?</th>
        </tr>
        </thead>
        <tbody>
        @foreach($finals as $final)
        <tr>
            <td>{{$final['first_name']}} {{$final['last_name']}}</td>
            <td> <a href="{{ url('/studentworkprocessoverview', $final['core_task_id']) }}">{{$final['title']}}</a></td>
            <td>{{$final['description']}}</td>
            @if($final['done'] == 0)
                <td class="donex"></td>
            @elseif($final['done'] == 1)
                <td class="donev"></td>
            @endif
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
