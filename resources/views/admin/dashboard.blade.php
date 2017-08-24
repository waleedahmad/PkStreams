@extends('layout')

@section('title')
    <title>
        Admin Dashboard - PkStreams
    </title>
@endsection()

@section('content')
    <div class="header">
        <h3>
            Admin Dashboard
        </h3>
    </div>

    <div class="admin">
        <div class="mdl-grid">
            <div class="mdl-cell  mdl-cell--12-col-phone mdl-cell--6-col-tablet mdl-cell--6-col-desktop">

                <div class="title">
                    <h2>
                        TV Shows
                    </h2>
                </div>

                <div class="count">
                    <h1>
                        <a href="/admin/shows">
                            {{\App\Show::count()}}
                        </a>
                    </h1>
                </div>

            </div>
            <div class="mdl-cell  mdl-cell--12-col-phone mdl-cell--6-col-tablet mdl-cell--6-col-desktop">
                <div class="title">
                    <h2>
                        Movies
                    </h2>
                </div>

                <div class="count">
                    <h1>
                        <a href="/admin/movies">
                            {{\App\Movie::count()}}
                        </a>
                    </h1>
                </div>
            </div>
        </div>
    </div>

@endSection()

