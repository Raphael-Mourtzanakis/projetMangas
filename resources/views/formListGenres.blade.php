@extends("layouts.master")

@section('content')
    <h1>Liste des Mangas par Genre</h1>

    <form method="POST" action="{{route('validListMangaParGenre')}}">
        {{ csrf_field() }}

        <div class="col-md-12 card card-body bg-light">
            <div class="form-group">
                <label class="col-md-3">Genre : </label>
                <div class="col-md-6">
                    <select class="form-select form-control" name="genre" required>
                        <option value="">--- Sélectionnez un genre ---</option>
                        @foreach ($genres as $genre)
                            <option value="{{$genre->id_genre}}">{{$genre->lib_genre}}</option>
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
@endsection
