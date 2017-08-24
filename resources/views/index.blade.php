@extends('layout')

@section('title')
    <title>
        PkStreams
    </title>
@endsection()


@section('content')
    <div class="header">
        <h3>
            TV Shows
        </h3>
    </div>

    <div class="content">
        <div class="mdl-grid">
            @foreach($shows as $show)
                <div class="mdl-cell mdl-cell--2-col mdl-cell--4-col-tablet mdl-cell--12-col-phone">
                    <a href="/show/{{$show->id}}">
                        <div class="demo-card-image mdl-card mdl-shadow--2dp" style="background : url('/storage/{{$show->image_uri}}')  center / cover;">
                            <div class="mdl-card__title mdl-card--expand"></div>
                            <div class="mdl-card__actions">
                                <span class="demo-card-image__filename">{{$show->name}}</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <a href="/shows" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect show-all">
            View all Shows
        </a>
    </div>

    <div class="header">
        <h3>
            Movies
        </h3>
    </div>

    <div class="content">
        <div class="mdl-grid">
            @foreach($movies as $movie)
                <div class="mdl-cell mdl-cell--2-col mdl-cell--4-col-tablet mdl-cell--12-col-phone">
                    <a href="/movie/{{$movie->id}}">
                        <div class="demo-card-image mdl-card mdl-shadow--2dp" style="background : url('/storage/{{$movie->image_uri}}')  center / cover;">
                            <div class="mdl-card__title mdl-card--expand"></div>
                            <div class="mdl-card__actions">
                                <span class="demo-card-image__filename">{{$movie->name}} ({{$movie->year}})</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
        <a href="/movies" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect show-all">
            View all Movies
        </a>
    </div>
@endSection()

