@extends('layout')

@section('title')
    <title>
        {{$show->name}} - Add Season / Admin - PkStreams
    </title>
@endsection()

@section('content')
    <div class="header">
        <h3>
            <a href="/admin/shows/{{$show->id}}/seasons"><i class="material-icons">&#xE314;</i></a>

            Add {{$show->name}} Seasons
        </h3>
    </div>

    <div class="admin">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--6-col-tablet mdl-cell--12-col-phone">
                <div class="data-form">
                    <form action="/admin/shows/seasons" method="POST" enctype="multipart/form-data">

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-textfield--full-width @if($errors->has('season_no')) is-invalid is-dirty @endif">
                            <input class="mdl-textfield__input" type="text" value="{{old('season_no')}}"  id="season_no" name="season_no"/>
                            <label class="mdl-textfield__label" for="name">Season #</label>
                            @if($errors->has('season_no'))
                                <span class="mdl-textfield__error">{{$errors->first('season_no')}}</span>
                            @endif
                        </div>

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-textfield--full-width @if($errors->has('year')) is-invalid is-dirty @endif">
                            <input class="mdl-textfield__input" type="text" value="{{old('year')}}"  id="year" name="year"/>
                            <label class="mdl-textfield__label" for="name">Year</label>
                            @if($errors->has('year'))
                                <span class="mdl-textfield__error">{{$errors->first('year')}}</span>
                            @endif
                        </div>


                        <input type="hidden" name="id" value="{{$show->id}}">


                        <!-- Accent-colored raised button with ripple -->
                        <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored mdl-right">
                            Add Season
                        </button>
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>

@endSection()

