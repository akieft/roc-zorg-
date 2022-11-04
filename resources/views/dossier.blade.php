@extends('layouts.master')

@section('content')
        <main class="container">
            @if ($user->hasRole('teacher'))
            <table class="table">
                <thead>
                <tr>
                    <!-- Table Head -->
                    <th class="table-head light-orange sub-dark-anthracite" scope="col">Cijferlijst <!-- Student --> (docent)</th>
                    <th class="table-head light-orange" scope="col"></th>
                </tr>
                </thead>
                <form class="kd-form" method="post" action="dossier">
                    @csrf
                <input type="hidden" value="{{$dossier->id}}" name="dossier">
                <tbody>
                <!-- Table Body -->
                <tr>
                    <td class="row-left plat-dark-anthracite" scope="row">Dutch</td>
                    <td class="row-right">
                        <input type="number" min="1" max="10" step="0.1" name="dutch" value="{{$dossier->test_dutch}}"/>
                    </td>
                </tr>
                <tr>
                    <td class="row-left plat-dark-anthracite" scope="row">Care</td>
                    <td class="row-right">
                        <input type="number" min="1" max="10" step="0.1" name="care" value="{{$dossier->test_care}}"/>
                    </td>
                </tr>
                <tr>
                    <td class="row-left plat-dark-anthracite" scope="row">Essay</td>
                    <td class="row-right">
                        <input type="number" min="1" max="10" step="0.1" name="essay" value="{{$dossier->test_essay}}"/>
                    </td>
                </tr>
                <tr>
                    <td class="row-left plat-dark-anthracite" scope="row">Math</td>
                    <td class="row-right">
                        <input type="number" min="1" max="10" step="0.1" name="math" value="{{$dossier->test_math}}"/>
                        <button class="btn btn-secondary btn-sm " type="submit">Save</button>
                    </td>
                </tr>
                </tbody>
                </form>
            </table>
            @endif
            @if ($user->hasRole('student'))
                <table class="table">
                    <thead>
                    <tr>
                        <!-- Table Head -->
                        <th class="table-head light-orange sub-dark-anthracite" scope="col">Cijferlijst <!-- Student --> (student)</th>
                        <th class="table-head light-orange" scope="col"></th>
                    </tr>
                    </thead>
                    <form class="kd-form" method="post" action="dossier">
                        @csrf
                        <input type="hidden" value="{{$dossier->id}}" name="student">
                        <tbody>
                        <!-- Table Body -->
                        <tr>
                            <td class="row-left plat-dark-anthracite" scope="row">Dutch</td>
                            <td class="row-right">
                                {{$dossier->test_dutch}}
                            </td>
                        </tr>
                        <tr>
                            <td class="row-left plat-dark-anthracite" scope="row">Care</td>
                            <td class="row-right">
                                {{$dossier->test_care}}
                            </td>
                        </tr>
                        <tr>
                            <td class="row-left plat-dark-anthracite" scope="row">Essay</td>
                            <td class="row-right">
                                {{$dossier->test_essay}}
                            </td>
                        </tr>
                        <tr>
                            <td class="row-left plat-dark-anthracite" scope="row">Math</td>
                            <td class="row-right">
                                {{$dossier->test_math}}
                            </td>
                        </tr>
                        </tbody>
                    </form>
                </table>
            @endif
        </main>
@endsection
