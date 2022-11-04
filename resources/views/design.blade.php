@extends('layouts.master')

@section('content')
<main class="container">
    <!-- Form Design -->
    <form class="form" action="" method='post'>
        <div class="col-6 card grey form mb shadow-sm">
            <div class="col">
                <label for="name">Naam:</label>
                <input type="text" placeholder="Naam">
            </div>
            <div class="col">
                <label for="title">Titel:</label>
                <input type="text" placeholder="Titel">
            </div>
            <div class="col">
                <label for="number">Nummer:</label>
                <input type="number" min="1" max="10" step="1" value="1"/>
            </div>
            <div class="col">
                <label for="textarea">Bericht:</label>
                <textarea rows = "5" cols = "60" name = "description" placeholder="Jouw bericht..."></textarea>
            </div>
            <div class="col">
                <button type="submit" class="btn button-anthracite">Verstuur</button>
            </div>
        </div>
    </form>
    <br>
    <!-- Label and input next to each other -->
    <div class="col-6">
        <div class="form-group row">
            <label for="tekst" class="col-sm-1 col-form-label">Tekst</label>
            <div class="col-sm-11">
                <input type="text" placeholder="Tekst">
            </div>
        </div>
    </div>
    <br>
    <!-- Table design -->
    <div class="pb20 col-12">
        <div class="card">
            <table class="margin0 table table-bordered">
                <thead>
                <tr>
                    <!-- Table Head -->
                    <th class="orange-important table-head" scope="col">Naam</th>
                    <th class="orange-important table-head" scope="col">Titel</th>
                    <th class="orange-important table-head" scope="col">Nummer</th>
                    <th class="orange-important table-head" scope="col">Bericht</th>
                </tr>
                </thead>
                <!-- Table Body -->
                <tbody>
                <tr>
                    <td class="row-left">sfzgzbzzb</td>
                    <td class="row-right">zgzfzszsg</td>
                    <td class="row-right">hsdsrhsrhsr</td>
                    <td class="row-right">dfdbdbdghdg</td>
                </tr>
                </tbody>
            </table>
        </div>
    </div>
</main>
@endsection
