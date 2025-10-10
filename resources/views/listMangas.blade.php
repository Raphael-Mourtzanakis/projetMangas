@extends('layouts.master')
@section('content')
    <h1>Liste des Mangas</h1>

        <thead class="table table-bordered table-striped">
            <tr>
                    <td>
                        Couvertures
                    </td>
                    <td>
                        Titres
                    </td>
                    <td>
                        Prix
                    </td>
                    <td>
                        Genres
                    </td>
                    <td>
                        Nom des dessinateurs
                    </td>
                    <td>
                        Nom des scénaristes
                    </td>
            </tr>
        </thead>

        <tbody class="table table-bordered table-striped">
            <tr>
                <td>
                    <img class="img-thumbnail" src="{{ url('') }}">
                </td>
                <td>
                    <a href="{{url('/')}}"><i class="bi"></i></a>
                </td>
                <td>
                    <a onclick="return confirm('Supprimer ce manga ?')"
                       href="{{url('/')}}"><i class="bi"></i></a>
                </td>
            </tr>
        </tbody>
    </table>
@endsection
