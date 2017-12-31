@extends('layout')

@section('title')
    <title>
        Manage Movie / Admin - PkStreams
    </title>
@endsection()

@section('content')
    <div class="header">
        <h3>
            <a href="/admin"><i class="material-icons">&#xE314;</i></a>

            Movies

            <a href="/admin/movies/add" class="btn-link">
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
                    Add Movie
                </button>
            </a>
        </h3>
    </div>

    <div class="admin">
        @if($movies->count())
            <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--12-col-phone">
                <thead>
                <tr>
                    <th class="mdl-data-table__cell--non-numeric">Name</th>
                    <th class="mdl-data-table__cell--non-numeric">Year</th>
                    <th class="mdl-data-table__cell--non-numeric">Added On</th>

                    <th class="mdl-data-table__cell--non-numeric">Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($movies as $movie)
                    <tr class="movie">
                        <td class="mdl-data-table__cell--non-numeric">{{$movie->name}}</td>
                        <td class="mdl-data-table__cell--non-numeric">{{$movie->year}}</td>
                        <td class="mdl-data-table__cell--non-numeric">{{$movie->created_at}}
                        <td class="mdl-data-table__cell--non-numeric">
                            <a href="/admin/movies/update/{{$movie->id}}" class="btn-link">
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
                                    Update
                                </button>
                            </a>

                            <a href="/admin/movies/delete/{{$movie->id}}" class="btn-link delete-movie" data-id="{{$movie->id}}">
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
                                    Delete
                                </button>
                            </a>
                        </td>
                    </tr>
                @endforeach

                </tbody>
            </table>
        @else
            You don't have any movies in your database.
        @endif
    </div>

@endSection()

