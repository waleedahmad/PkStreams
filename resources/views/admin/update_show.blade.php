@extends('layout')

@section('title')
    <title>
        {{$show->name}} / Admin - PkStreams
    </title>
@endsection()

@section('content')
    <div class="header">
        <h3>
            <a href="/admin/shows"><i class="material-icons">&#xE314;</i></a>

            {{$show->name}}
        </h3>
    </div>

    <div class="admin">
        <div class="mdl-grid">
            <div class="mdl-cell mdl-cell--4-col-desktop mdl-cell--6-col-tablet mdl-cell--12-col-phone">
                <div class="data-form">
                    <form action="/admin/shows/update" method="POST" enctype="multipart/form-data">
                        <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-textfield--full-width @if($errors->has('name')) is-invalid is-dirty @endif">
                            <input class="mdl-textfield__input" type="text" value="{{old('name') ? old('name') : $show->name}}"  id="name" name="name"/>
                            <label class="mdl-textfield__label" for="name">Show Name</label>
                            @if($errors->has('name'))
                                <span class="mdl-textfield__error">{{$errors->first('name')}}</span>
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
                            Update Show
                        </button>

                        <input type="hidden" name="id" value="{{$show->id}}">
                        {{csrf_field()}}
                    </form>
                </div>
            </div>
        </div>
    </div>

@endSection()

