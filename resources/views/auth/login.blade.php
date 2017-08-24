@extends('layout')

@section('title')
    <title>
        Login - PkStreams
    </title>
@endsection()


@section('content')
    <div class="mdl-grid">
        <div class="mdl-layout-spacer"></div>
        <div class="mdl-cell mdl-cell--3-col-desktop mdl-cell--6-col-tablet mdl-cell--12-col-phone">
            <div class="auth">
                <h4 class="mdl-typography--text-center title">
                    Sign in
                </h4>
                <form action="/login" method="POST">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-textfield--full-width @if($errors->has('email')) is-invalid is-dirty @endif">
                        <input class="mdl-textfield__input" type="text" value="{{old('email')}}"  id="email" name="email"/>
                        <label class="mdl-textfield__label" for="email">Email</label>
                        @if($errors->has('email'))
                            <span class="mdl-textfield__error">{{$errors->first('email')}}</span>
                        @endif
                    </div>

                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label mdl-textfield--full-width @if($errors->has('password')) is-invalid is-dirty @endif">
                        <input class="mdl-textfield__input" type="password" name="password" id="password"/>
                        <label class="mdl-textfield__label" for="password">Password</label>
                        @if($errors->has('password'))
                            <span class="mdl-textfield__error">{{$errors->first('password')}}</span>
                        @endif

                        @if(Session::has('message'))
                            <span class="mdl-textfield__error">{{Session::get('message')}}</span>
                        @endif
                    </div>


                    <!-- Accent-colored raised button with ripple -->
                    <button class="mdl-button mdl-js-button mdl-button--raised mdl-js-ripple-effect mdl-button--colored mdl-right">
                        Sign in
                    </button>
                    {{csrf_field()}}
                </form>
            </div>
        </div>
        <div class="mdl-layout-spacer"></div>
    </div>
@endSection()

