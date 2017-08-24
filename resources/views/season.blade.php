@extends('layout')

@section('title')
    <title>
        Season {{$season->season_no}} {{$season->show->name}} - PkStreams
    </title>
@endsection()


@section('content')
    <div class="header">
        <h3>
            <a href="/show/{{$season->show->id}} "><i class="material-icons">&#xE314;</i></a> {{$season->show->name}} - Season {{$season->season_no}}
        </h3>
    </div>

    <div class="mdl-grid content">
        @foreach($season->episodes as $episode)
            <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--12-col-phone">

                <div class="demo-card-square mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title mdl-card--expand">
                        <h1 class="mdl-card__title-text">
                            Episode {{$episode->episode_no}}
                        </h1>
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <a href="/episode/{{$episode->id}}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                            Stream Now
                        </a>
                    </div>
                </div>

            </div>
        @endforeach

    </div>


@endSection()
