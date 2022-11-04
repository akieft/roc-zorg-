@extends('layouts.master')

@section('content')
<div class="container">
    <table class="table">
        <thead>
        <tr>
            <!-- Table Head -->
            <th class="table-head light-orange sub-dark-anthracite" scope="col">Competentie</th>
            <th class="table-head light-orange" scope="col"></th>
        </tr>
        </thead>
    </table>
    <table class="table table-bordered border-primary">
        <thead>
        <tr>
            <th scope="col">Student</th>
            <th scope="col">Competentie</th>
            <th scope="col">Klaar?</th>
            <th scope="col">Werkproces</th>
        </tr>
        </thead>
        <tbody>
        @foreach($finals as $final)
        <tr>
            <td>{{$final['first_name']}} {{$final['last_name']}}</td>
            <td>{{$final['competence_title']}}</td>
            @if($final['done'] == 0)
                <td class="donex"><a href="{{ url('/competencedone/'. $final['competence_id']. "/". $id)}}">Set done</a></td>
            @elseif($final['done'] == 1)
                <td class="donev"><a href="{{ url('/competenceundone/'. $final['competence_id']. "/". $id)}}">Set not done</a></td>
            @endif
                <td>{{$final['work_process_title']}}</td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
