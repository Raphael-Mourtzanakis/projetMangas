@extends('layouts.master')
@section('content')
    <h1>Liste des Mangas</h1>

    <table class="table table-bordered table-striped" style="margin-bottom: 50px;">
        <thead class="table table-bordered table-striped">
            <tr>
                <th>Couvertures</th>
                <th>Titres</th>
                <th>Prix</th>
                <th>Genres</th>
                <th>Nom des dessinateurs</th>
                <th>Nom des scénaristes</th>
                <th></th>
            </tr>
        </thead>

        <tbody class="table table-bordered table-striped">
            @foreach ($mangas as $ligne)
            <tr>
                <td><img class="img-thumbnail" src="{{ url('assets/images/'.$ligne->couverture) }}"></td>
                <td><a href="{{url('/')}}"><i class="bi"></i></a></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td><a onclick="return confirm('Supprimer ce manga ?')" href="{{url('/')}}"> <i class="bi bi-trash"></i> </a></td>
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
