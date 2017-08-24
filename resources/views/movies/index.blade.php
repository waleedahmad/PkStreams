@extends('layout')

@section('title')
    <title>
        Movies - PkStreams
    </title>
@endsection()

@section('header_title')
    PkStreams
@endsection()

@section('drawer_title')
    PkStreams
@endsection()

@section('content')
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
                                <span class="demo-card-image__filename">{{$movie->name}}</span>
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach
        </div>
    </div>

@endSection()


