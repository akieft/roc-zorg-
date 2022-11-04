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
                            <th class="table-head light-orange sub-dark-anthracite" scope="col">Kerntaak toevoegen</th>
                            <th class="table-head light-orange" scope="col"></th>
                        </tr>
                        </thead>
                    </table>
                    <form class="coretask-form" method="post" action="{{ route('coretask') }}">
                        @csrf
                        <label for="title">Titel:</label><br>
                        <input type="text" id="title" name="title"><br>
                        <label for="description">Beschrijving</label><br>
                        <textarea id="description" name="description" rows="4" cols="50"></textarea>
                        <br>
                        <input type="Submit" class="btn btn-primary" placeholder="Opslaan">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
