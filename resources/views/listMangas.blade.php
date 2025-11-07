@extends('layouts.master')
@section('content')
    <h1>Liste des Mangas @if ($genre) par le Genre {{$genre->lib_genre}}@endif </h1>

    @if ($genre)
        <form method="POST" action="{{route('listMangasParLeGenre')}}" class="list-form">
            {{ csrf_field() }}

            <div class="col-md-12 card card-body bg-light">
                <div class="form-group">
                    <label class="col-md-3">Genre : </label>
                    <div class="col-md-6">
                        <select class="form-select form-control" name="genre" required>
                            @foreach ($genres as $unGenre)
                                <option value="{{$unGenre->id_genre}}" @if ($unGenre->id_genre == $genre->id_genre) selected @endif>{{$unGenre->lib_genre}}</option>
                            @endforeach
                        </select>
                    </div>
                </div>

                <hr>
                <div class="form-group">
                    <div class="col-md-12 col-md-offset-3">
                        <button type="submit" class="btn btn-primary">
                            Valider
                        </button>
                        <button type="button" class="btn btn-secondary"
                                onclick="if (confirm('Annuler la recherche ?')) window.location='{{ url('/') }}'; ">
                            Annuler
                        </button>
                    </div>
                </div>
            </div>
        </form>
    @endif

    @if (count($mangas) > 0)
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
    @else
    <p class="aucun-resultat">Il n'y a aucun manga pour ce genre</p>
    @endif
@endsection
