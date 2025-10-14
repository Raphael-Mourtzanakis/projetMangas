@extends("layouts.master")

@section('content')
    <form method="POST" action=" ">
        {{ csrf_field() }}

        <h1> </h1>
        <div class="col-md-12 card card-body bg-light">
            <div class="form-group">
                <label class="col-md-3">Titre : </label>
                <div class="col-md-6">
                    <input type="text" name="titre" value="" class="form-control" required>
                </div>
            </div>
            <div class="form-group">
                <label class="col-md-3">Genre : </label>
                <div class="col-md-6">
                    <select class="form-select form-control" name="genre" required>
                        @if (!$manga->id_manga) <option value="">--- Sélectionnez un état ---</option>@endif <!-- Mettre une option vide que quand on créer un Manga}} -->
                        @foreach ($genres as $genre)
                            <option value="{{$genre->id_genre}}" @if ($manga->id_genre == $genre->id_genre) selected @endif>{{$genre->lib_genre}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group">
                <label class="col-md-3">Prix : </label>
                <div class="col-md-3">
                    <input type="number" step="0.01" name="prix" value="" class="form-control" required>
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
