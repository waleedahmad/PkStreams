@extends('layout')

@section('title')
    <title>
        {{$show->name}} / Admin - PkStreams
    </title>
@endsection()

@section('content')
    <div class="header">
        <h3>
            <a href="/admin/shows"><i class="material-icons">&#xE314;</i></a>

            {{$show->name}} Seasons

            <a href="/admin/shows/{{$show->id}}/seasons/add" class="btn-link">
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
                    Add Season
                </button>
            </a>
        </h3>
    </div>

    <div class="admin">
        @if($show->seasons->count())
            <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--12-col-phone">
                <thead>
                <tr>
                    <th class="mdl-data-table__cell--non-numeric">Season #</th>
                    <th class="mdl-data-table__cell--non-numeric">Year</th>
                    <th class="mdl-data-table__cell--non-numeric">Added</th>
                    <th class="mdl-data-table__cell--non-numeric">Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($show->seasons as $season)
                    <tr class="season">
                        <td class="mdl-data-table__cell--non-numeric">S{{$season->season_no}}</td>
                        <td class="mdl-data-table__cell--non-numeric">{{$season->year}}</td>
                        <td class="mdl-data-table__cell--non-numeric">{{$season->created_at}}
                        <td class="mdl-data-table__cell--non-numeric">

                            <a href="/admin/seasons/{{$season->id}}/episodes" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                                Episodes
                            </a>

                            <a href="/admin/shows/seasons/{{$season->id}}/update" class="btn-link">
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
                                    Update
                                </button>
                            </a>

                            <a href="/admin/movies/delete/{{$season->id}}" class="btn-link delete-season" data-id="{{$season->id}}">
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

