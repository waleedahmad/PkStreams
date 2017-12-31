@extends('layout')

@section('title')
    <title>
        S{{$episode->season->season_no}}E{{$episode->episode_no}} {{$episode->season->show->name}} - PkStreams
    </title>
@endsection()


@section('content')
    <div class="header">
        <h3>
            <a href="/season/{{$episode->season->id}}"><i class="material-icons">&#xE314;</i></a>
            {{$episode->season->show->name}} - Season {{$episode->season->season_no}} Episode {{$episode->episode_no}}
        </h3>
    </div>



    <div class="mdl-cell mdl-cell--12-col-desktop mdl-cell--12-col-tablet mdl-cell--12-col-phone vid-container">
        <video class="video-js vjs-big-play-centered vjs-default-skin" data-setup='{"fluid": "true", "wmode":"opaque","bgcolor":"#FFFFFF"}' controls preload="auto"  poster="/storage/{{$episode->season->show->image_uri}}">
            <source src="{{$episode->video_uri}}" type='video/mp4'>
        </video>
    </div>

@endSection()


@section('scripts')
    <script src="http://vjs.zencdn.net/ie8/1.1.2/videojs-ie8.min.js"></script>
    <script src="http://vjs.zencdn.net/6.2.4/video.js"></script>
@endSection

@section('style')
    <link href="http://vjs.zencdn.net/6.2.4/video-js.css" rel="stylesheet">
@endSection