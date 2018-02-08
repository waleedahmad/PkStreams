@extends('layout')

@section('title')
    <title>
        {{$movie->name}} - PkStreams
    </title>
@endsection()


@section('content')
    <div class="header">
        <h3>
            <a href="/"><i class="material-icons">&#xE314;</i></a> {{$movie->name}} ({{$movie->year}})
        </h3>
    </div>

    <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone vid-container">
        <video class="video-js vjs-big-play-centered" controls preload="auto"  data-setup='{"fluid": "true", "wmode":"opaque","bgcolor":"#FFFFFF"}' poster="/storage/{{$movie->image_uri}}">
            <source src="{{$movie->video_uri}}" type='video/mp4'>
        </video>
    </div>

@endSection()


@section('scripts')
    <script src="https://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
    <script src="https://vjs.zencdn.net/6.2.4/video.js"></script>
@endSection

@section('style')
    <link href="https://vjs.zencdn.net/6.2.4/video-js.css" rel="stylesheet">
@endSection