@extends('layout')

@section('title')
    <title>
        {{$season->show->name}} - Update Season / Admin - PkStreams
    </title>
@endsection()

@section('content')
    <div class="header">
        <h3>
            <a href="/admin/shows/{{$season->show->id}}/seasons"><i class="material-icons">&#xE314;</i></a>

            Update {{$season->show->name}} Season {{$season->season_no}}
        </h3>
    </div>

    <div class="admin">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--6-col-tablet mdl-cell--12-col-phone">
                <div class="data-form">
                    <form action="/admin/shows/seasons/update" method="POST" enctype="multipart/form-data">

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-textfield--floating-label mdl-textfield--full-width @if($errors->has('season_no')) is-invalid is-dirty @endif">
                            <input class="mdl-textfield__input" type="text" value="{{old('season_no') ? old('season_no'): $season->season_no}}"  id="season_no" name="season_no"/>
                            <label class="mdl-textfield__label" for="name">Season #</label>
                            @if($errors->has('season_no'))
                                <span class="mdl-textfield__error">{{$errors->first('season_no')}}</span>
                            @endif
                        </div>

                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-textfield--floating-label mdl-textfield--full-width @if($errors->has('year')) is-invalid is-dirty @endif">
                            <input class="mdl-textfield__input" type="text" value="{{old('year') ? old('year'): $season->year}}"  id="year" name="year"/>
                            <label class="mdl-textfield__label" for="name">Year</label>
                            @if($errors->has('year'))
                                <span class="mdl-textfield__error">{{$errors->first('year')}}</span>
                            @endif
                        </div>


                        <input type="hidden" name="id" value="{{$season->id}}">


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

