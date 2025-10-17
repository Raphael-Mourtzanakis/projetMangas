@extends('layouts.master')
@section('content')
    <h1>Liste des Mangas</h1>

    <table class="table table-bordered table-striped" style="margin-bottom: 50px;">
        <thead class="table table-bordered table-striped">
            <tr>
                <th>Couverture</th>
                <th>Titre</th>
                <th>Prix</th>
                <th>Genre</th>
                <th>Dessinateur</th>
                <th>Scénariste</th>
                <th></th>
                <th></th>
            </tr>
        </thead>

        <tbody class="table table-bordered table-striped">
            @foreach ($mangas as $ligne)
            <tr>
                <td><img class="img-thumbnail" src="{{ url('/assets/images/'.$ligne->couverture) }}"></td>
                <td>{{$ligne->titre}}</td>
                <td>{{$ligne->prix}} €</td>
                <td>{{$ligne->lib_genre}}</td>
                <td>{{$ligne->nom_dessinateur}} {{$ligne->prenom_dessinateur}}</td>
                <td>{{$ligne->nom_scenariste}} {{$ligne->prenom_scenariste}}</td>
                <td><a href="{{url('/modifierManga/'.$ligne->id_manga)}}"> <i class="bi bi-pencil"></i> </a></td> <!-- // Modifier le manga -->
                <td><a onclick="return confirm('Supprimer ce manga ?')" href="{{url('/supprimerManga/'.$ligne->id_manga)}}"> <i class="bi bi-trash"></i> </a> <!-- Supprimer le manga -->
            </tr>
            @endforeach
        </tbody>
    </table>
@endsection
