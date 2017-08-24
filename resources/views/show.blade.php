@extends('layout')

@section('title')
    <title>
        {{$show->name}} - PkStreams
    </title>
@endsection()


@section('content')
    <div class="header">
        <h3>
            <a href="/"><i class="material-icons">&#xE314;</i></a> {{$show->name}}
        </h3>
    </div>

    <div class="mdl-grid content">
        @foreach($show->seasons as $season)
            <div class="mdl-cell mdl-cell--3-col mdl-cell--4-col-tablet mdl-cell--12-col-phone">
                <div class="demo-card-square mdl-card mdl-shadow--2dp">
                    <div class="mdl-card__title mdl-card--expand">
                        <h1 class="mdl-card__title-text">
                            Season {{$season->season_no}}
                        </h1>
                    </div>
                    <div class="mdl-card__supporting-text">
                        {{$season->episodes->count()}} Episodes
                    </div>
                    <div class="mdl-card__actions mdl-card--border">
                        <a href="/season/{{$season->id}}" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                            Stream Now
                        </a>
                    </div>
                </div>
            </div>
        @endforeach

    </div>


@endSection()
