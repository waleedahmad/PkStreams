@extends('layout')

@section('title')
    <title>
        Manage TV Shows / Admin - PkStreams
    </title>
@endsection()

@section('content')
    <div class="header">
        <h3>
            <a href="/admin"><i class="material-icons">&#xE314;</i></a>

            TV Shows

            <a href="/admin/shows/add" class="btn-link">
                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
                    Add TV Show
                </button>
            </a>
        </h3>
    </div>

    <div class="admin">
        @if($shows->count())
            <table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp mdl-cell--6-col-desktop mdl-cell--6-col-tablet mdl-cell--12-col-phone">
                <thead>
                <tr>
                    <th class="mdl-data-table__cell--non-numeric">Name</th>
                    <th class="mdl-data-table__cell--non-numeric">Added On</th>
                    <th class="mdl-data-table__cell--non-numeric">Actions</th>
                </tr>
                </thead>
                <tbody>

                @foreach($shows as $show)
                    <tr class="show">
                        <td class="mdl-data-table__cell--non-numeric">{{$show->name}}</td>
                        <td class="mdl-data-table__cell--non-numeric">{{$show->created_at}}</td>
                        <td class="mdl-data-table__cell--non-numeric">

                            <a href="/admin/shows/{{$show->id}}/seasons" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                                Seasons
                            </a>

                            <a href="/admin/shows/update/{{$show->id}}" class="btn-link">
                                <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored">
                                    Update
                                </button>
                            </a>

                            <a href="/admin/shows/delete/{{$show->id}}" class="btn-link delete-show" data-id="{{$show->id}}">
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
            You don't have any shows in your database.
        @endif
    </div>

@endSection()

