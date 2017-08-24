@extends('layout')

@section('title')
    <title>
        Add Movie / Admin - PkStreams
    </title>
@endsection()

@section('content')
    <div class="header">
        <h3>
            <a href="/admin/movies"><i class="material-icons">&#xE314;</i></a>

            Add Movie
        </h3>
    </div>

    <div class="admin">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--6-col-tablet mdl-cell--12-col-phone">
                <div class="data-form">
                    <form action="/admin/movies" method="POST" enctype="multipart/form-data">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-textfield--full-width @if($errors->has('name')) is-invalid is-dirty @endif">
                            <input class="mdl-textfield__input" type="text" value="{{old('name')}}"  id="name" name="name"/>
                            <label class="mdl-textfield__label" for="name">Movie Name</label>
                            @if($errors->has('name'))
                                <span class="mdl-textfield__error">{{$errors->first('name')}}</span>
                            @endif
                        </div>

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-textfield--full-width @if($errors->has('year')) is-invalid is-dirty @endif">
                            <input class="mdl-textfield__input" type="text" value="{{old('year')}}"  id="year" name="year"/>
                            <label class="mdl-textfield__label" for="name">Year</label>
                            @if($errors->has('year'))
                                <span class="mdl-textfield__error">{{$errors->first('year')}}</span>
                            @endif
                        </div>

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-textfield--full-width @if($errors->has('video_uri')) is-invalid is-dirty @endif">
                            <input class="mdl-textfield__input" type="text" value="{{old('video_uri')}}"  id="video_uri" name="video_uri"/>
                            <label class="mdl-textfield__label" for="name">Video URI</label>
                            @if($errors->has('video_uri'))
                                <span class="mdl-textfield__error">{{$errors->first('video_uri')}}</span>
                            @endif
                        </div>

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-textfield--file mdl-textfield--full-width">
                            <input class="mdl-textfield__input" placeholder="Display Image" type="text" id="uploadFile" readonly/>
                            <div class="mdl-button mdl-button--primary mdl-button--icon mdl-button--file">

                                <i class="material-icons">&#xE226;</i><input type="file" name="image" id="uploadBtn">
                            </div>

                            @if($errors->has('image'))
                                <span class="mdl-textfield__error">{{$errors->first('image')}}</span>
                            @endif
                        </div>


                        <!-- Accent-colored raised button with ripple -->
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored mdl-right">
                            Add Movie
                        </button>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>

@endSection()

