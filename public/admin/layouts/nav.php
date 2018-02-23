<nav class="light-verde">
    <div class="nav-wrapper">
        <a href="#!" class="brand-logo"><img src="../assets/images/logo-light.png" class="logoSession2"></a>
        <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
        <ul class="right hide-on-med-and-down">
            <li><a href="sesion.php"><i class="material-icons prefix">account_circle</i></a></li>
            <li><a href="logout.php"><i class="material-icons prefix">settings_power</i></a></li>
        </ul>
        <ul class="side-nav" id="mobile-demo">
            <li class="first"><img src="../assets/images/logo-light.png" class="logoSession3"></li>
            <li>
                <?php include 'user.php'; ?>
            </li>
            <li><a href="principal.php"><i class="material-icons">dashboard</i>Dashboard</a></li>

            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="categorias_registrar.php">Registrar</a></li>
                                <li><a href="listar_categorias.php">Listar</a></li>
                            </ul>
                        </div>
                        <a class="collapsible-header">Categorías<i class="material-icons">arrow_drop_down</i></a>
                    </li>
                </ul>
            </li>

            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header">Productos<i class="material-icons">arrow_drop_down</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="productos_registrar.php">Registrar</a></li>
                                <li><a href="listar_productos.php">Listar</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>

            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header">Servicios<i class="material-icons">arrow_drop_down</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="servicios_registrar.php">Registrar</a></li>
                                <li><a href="listar_servicios.php">Listar</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>

            <li class="no-padding">
                <ul class="collapsible collapsible-accordion">
                    <li>
                        <a class="collapsible-header">Novedades<i class="material-icons">arrow_drop_down</i></a>
                        <div class="collapsible-body">
                            <ul>
                                <li><a href="novedades_registrar.php">Registrar</a></li>
                                <li><a href="listar_novedades.php">Listar</a></li>
                            </ul>
                        </div>
                    </li>
                </ul>
            </li>

            <li>
                <div class="divider"></div>
            </li>
            <li><a class="subheader">Otras funciones</a></li>
            <li><a class="waves-effect" href="gestion_usuarios.php"><i class="material-icons">group</i>Gestion de usuarios</a></li>
            <li><a class="waves-effect" href="trabaja_nosotros.php"><i class="material-icons">spa</i>Trabaja con nosotros</a></li>
        </ul>
    </div>
</nav>

<ul id="slide-out" class="side-nav fixed">
    <li class="first"><img src="../assets/images/logo-light.png" class="logoSession3"></li>
    <li>
        <?php include 'user.php'; ?>
    </li>
    <li><a href="principal.php"><i class="material-icons">dashboard</i>Dashboard</a></li>

    <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
            <li>
                <a class="collapsible-header">Categorías<i class="material-icons">arrow_drop_down</i></a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="categorias_registrar.php">Registrar</a></li>
                        <li><a href="listar_categorias.php">Listar</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </li>

    <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
            <li>
                <a class="collapsible-header">Productos<i class="material-icons">arrow_drop_down</i></a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="productos_registrar.php">Registrar</a></li>
                        <li><a href="listar_productos.php">Listar</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </li>

    <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
            <li>
                <a class="collapsible-header">Servicios<i class="material-icons">arrow_drop_down</i></a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="servicios_registrar.php">Registrar</a></li>
                        <li><a href="listar_servicios.php">Listar</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </li>

    <li class="no-padding">
        <ul class="collapsible collapsible-accordion">
            <li>
                <a class="collapsible-header">Novedades<i class="material-icons">arrow_drop_down</i></a>
                <div class="collapsible-body">
                    <ul>
                        <li><a href="novedades_registrar.php">Registrar</a></li>
                        <li><a href="listar_novedades.php">Listar</a></li>
                    </ul>
                </div>
            </li>
        </ul>
    </li>

    <li>
        <div class="divider"></div>
    </li>
    <li><a class="subheader">Otras funciones</a></li>
    <?php if (auth()->is_root) : ?>
    <li><a class="waves-effect" href="gestion_usuarios.php"><i class="material-icons">group</i>Gestion de usuarios</a></li>
    <?php endif; ?>
    <li><a class="waves-effect" href="trabaja_nosotros.php"><i class="material-icons">spa</i>Trabaja con nosotros</a></li>
</ul>
