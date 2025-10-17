@extends("layouts.master")

@section('content')
    <form method="POST" action="{{route('validManga')}}" enctype="multipart/form-data">
        {{ csrf_field() }}

        <h1>@if (!$manga->id_manga) Ajout @else Modification @endif d'un Manga</h1>
        @if ($manga->id_manga) <input type="hidden" value="{{$manga->id}}" name="id" required>@endif

        <div class="col-md-12 card card-body bg-light">
            <div class="form-group">
                <label class="col-md-3">Titre : </label>
                <div class="col-md-6">
                    <input type="text" name="titre" value="{{$manga->titre}}" class="form-control" required>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3">Genre : </label>
                <div class="col-md-6">
                    <select class="form-select form-control" name="genre" required>
                        @if (!$manga->id_manga) <option value="">--- Sélectionnez un genre ---</option>@endif <!-- Mettre une option vide que quand on créer un Manga}} -->
                        @foreach ($genres as $genre)
                            <option value="{{$genre->id_genre}}" @if ($manga->id_genre == $genre->id_genre) selected @endif>{{$genre->lib_genre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3">Dessinateur : </label>
                <div class="col-md-6">
                    <select class="form-select form-control" name="dessinateur" required>
                        @if (!$manga->id_manga) <option value="">--- Sélectionnez un dessinateur ---</option>@endif <!-- Mettre une option vide que quand on créer un Manga}} -->
                        @foreach ($dessinateurs as $dessinateur)
                            <option value="{{$dessinateur->id_dessinateur}}" @if ($manga->id_dessinateur == $dessinateur->id_dessinateur) selected @endif>
                                {{$dessinateur->nom_dessinateur}}@if ($dessinateur->prenom_dessinateur ==! "") {{$dessinateur->prenom_dessinateur}}@endif
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3">Scénariste : </label>
                <div class="col-md-6">
                    <select class="form-select form-control" name="scenariste" required>
                        @if (!$manga->id_manga) <option value="">--- Sélectionnez un scénariste ---</option>@endif <!-- Mettre une option vide que quand on créer un Manga}} -->
                        @foreach ($scenaristes as $scenariste)
                            <option value="{{$scenariste->id_scenariste}}" @if ($manga->id_scenariste == $scenariste->id_scenariste) selected @endif>
                                {{$scenariste->nom_scenariste}}@if ($scenariste->prenom_scenariste ==! "") {{$scenariste->prenom_scenariste}}@endif
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3">Prix : </label>
                <div class="col-md-3" style="display: flex; align-items: center;">
                    <input type="number" step="0.01" name="prix" value="{{$manga->prix}}" class="form-control" required>
                    <span style="margin-left: 5px;"> € </span>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3">Couverture : </label>
                <div class="col-md-3">
                    <input type="hidden" name="MAX_FILE_SIZE" value="204800">
                    <input type="file" name="couverture" value="" accept="image/*" class="form-control">
                </div>
            </div>

            <hr>
            <div class="form-group">
                <div class="col-md-12 col-md-offset-3">
                    <button type="submit" class="btn btn-primary">
                        Valider
                    </button>
                    <button type="button" class="btn btn-secondary"
                            onclick="if (confirm('Annuler la saisie ?')) window.location='{{ url('/') }}'; ">
                        Annuler
                    </button>
                </div>
            </div>
        </div>
    </form>
@endsection
