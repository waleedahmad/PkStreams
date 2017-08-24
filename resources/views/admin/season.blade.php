@extends('layout')

@section('title')
    <title>
        {{$season->show->name}} / Admin - PkStreams
    </title>
@endsection()

@section('content')
    <div class="header">
        <h3>
            <a href="/admin/shows/{{$season->show->id}}/seasons"><i class="material-icons">&#xE314;</i></a>

            Season {{$season->season_no}} {{$season->show->name}}

            <a href="/admin/seasons/{{$season->id}}/episodes/add" class="btn-link">
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
                    Add Episode
                </button>
            </a>
        </h3>
    </div>

    <div class="admin">
        @if($season->episodes->count())
            <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--12-col-phone">
                <thead>
                <tr>
                    <th class="mdl-data-table__cell--non-numeric">Episode #</th>
                    <th class="mdl-data-table__cell--non-numeric">Added</th>
                    <th class="mdl-data-table__cell--non-numeric">Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($season->episodes as $episode)
                    <tr class="episode">
                        <td class="mdl-data-table__cell--non-numeric">E{{$episode->episode_no}}</td>
                        <td class="mdl-data-table__cell--non-numeric">{{$episode->created_at}}
                        <td class="mdl-data-table__cell--non-numeric">

                            {{--<a href="/admin/seasons/{{$episode->id}}/episodes" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                                Episodes
                            </a>--}}

                            <a href="/admin/episode/{{$episode->id}}/update" class="btn-link">
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
                                    Update
                                </button>
                            </a>

                            <a href="/admin/movies/delete/{{$episode->id}}" class="btn-link delete-episode" data-id="{{$episode->id}}">
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
            You don't have any episode of Season {{$season->season_no}} in your database.

        @endif
    </div>

@endSection()

