<header class="mdl-layout__header">
    <div class="mdl-layout__header-row">
        <!-- Title -->
        <i class="material-icons">&#xE04A;</i>
        <span class="mdl-layout-title">PkStreams</span>
        <!-- Add spacer, to align navigation to the right -->

        <div class="mdl-layout-spacer"></div>

        <!-- Navigation -->
        <nav class="mdl-navigation mdl-layout--large-screen-only">

            <div class="mdl-textfield mdl-js-textfield mdl-textfield--expandable
                  mdl-textfield--floating-label mdl-textfield--align-right">
                <label class="mdl-button mdl-js-button mdl-button--icon"
                       for="waterfall-exp">
                    <i class="material-icons">search</i>
                </label>
                <div class="mdl-textfield__expandable-holder">
                    <input class="mdl-textfield__input" type="text" name="sample"
                           id="waterfall-exp">
                </div>
            </div>

            <a class="mdl-navigation__link" href="/">Home</a>
            <a class="mdl-navigation__link" href="/shows">TV Shows</a>
            <a class="mdl-navigation__link" href="/movies">Movies</a>

            @if(!Auth::check())
                <a class="mdl-navigation__link" href="/register">Register</a>
                <a class="mdl-navigation__link" href="/login">Sign in</a>
            @else
                @if(Auth::user()->type === 'admin')
                    <a class="mdl-navigation__link" href="/admin">Admin</a>
                @endif
                <a class="mdl-navigation__link" href="/logout">Sign out</a>
            @endif
        </nav>
    </div>
</header>

<div class="mdl-layout__drawer">
    <span class="mdl-layout-title">PkStreams</span>
    <nav class="mdl-navigation">

        <a class="mdl-navigation__link" href="/shows">TV Shows</a>
        <a class="mdl-navigation__link" href="/movies">Movies</a>

            @if(!Auth::check())
                <a class="mdl-navigation__link" href="/register">Register</a>
                <a class="mdl-navigation__link" href="/login">Sign in</a>
            @else
            @if(Auth::user()->type === 'admin')
                <a class="mdl-navigation__link" href="/admin">Admin</a>
            @endif
                <a class="mdl-navigation__link" href="/logout">Sign out</a>
            @endif
    </nav>
</div>