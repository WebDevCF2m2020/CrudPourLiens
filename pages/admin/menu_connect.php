<nav class="navbar navbar-expand-md navbar-light">
    <a class="navbar-brand" href="./">Portfolio Admin</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#sousmenu" aria-controls="sousmenu" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="sousmenu">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item <?php if(!isset($_GET['admin'])) echo "active" ?>">
                <a class="nav-link" href="./">Accueil Admin</a>
            </li>
            <li class="nav-item <?php if(isset($_GET['admin'])&&$_GET['admin']=="liensadmin") echo "active" ?>">
                <a class="nav-link" href="?admin=liensadmin">CRUD des liens</a>
            </li>
        </ul>
        <a href="?admin=deco"><button class="btn btn-outline-primary my-2 my-sm-0" type="button">Se déconnecter</button></a>
    </div>
</nav>
