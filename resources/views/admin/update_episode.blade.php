@extends('layout')

@section('title')
    <title>
        S{{$episode->season->season_no}} - {{$episode->season->show->name}} - Add Episodes / Admin - PkStreams
    </title>
@endsection()

@section('content')
    <div class="header">
        <h3>
            <a href="/admin/seasons/{{$episode->season->id}}/episodes"><i class="material-icons">&#xE314;</i></a>

            S{{$episode->season->season_no}} - {{$episode->season->show->name}} - Update Episode
        </h3>
    </div>

    <div class="admin">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--6-col-tablet mdl-cell--12-col-phone">
                <div class="data-form">
                    <form action="/admin/episode/update" method="POST" enctype="multipart/form-data">

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-textfield--full-width @if($errors->has('episode_no')) is-invalid is-dirty @endif">
                            <input class="mdl-textfield__input" type="text" value="{{old('episode_no') ? old('episode') : $episode->episode_no}}"  id="episode_no" name="episode_no"/>
                            <label class="mdl-textfield__label" for="name">Episode #</label>
                            @if($errors->has('episode_no'))
                                <span class="mdl-textfield__error">{{$errors->first('episode_no')}}</span>
                            @endif
                        </div>

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-textfield--full-width @if($errors->has('video_uri')) is-invalid is-dirty @endif">
                            <input class="mdl-textfield__input" type="text" value="{{old('video_uri') ? old('video_uri') : $episode->video_uri}}"  id="video_uri" name="video_uri"/>
                            <label class="mdl-textfield__label" for="name">Video URI</label>
                            @if($errors->has('video_uri'))
                                <span class="mdl-textfield__error">{{$errors->first('video_uri')}}</span>
                            @endif
                        </div>

                        <input type="hidden" name="id" value="{{$episode->id}}">

                        <!-- Accent-colored raised button with ripple -->
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored mdl-right">
                            Update Season
                        </button>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>

@endSection()

