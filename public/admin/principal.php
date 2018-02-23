<?php 
    require_once __DIR__.'/../../app/Main.php';

    if (!authCheck()) {
        notify('Accesso denegado!!!', 'warning', 'Por favor inicio session');
        header('Location: index.php');
    } else {

?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'layouts/header.php';?>
</head>

<body>
    <?php include 'layouts/nav.php';?>
    <div class="row">
        <div class="col s9 offset-s3">
            <div class="row">
                <div class="col s12 m4 l4">
                    <a href="gestion_usuarios.php">
                        <div class="card dark">
                            <div class="card-content white-text center">
                                <div class="col s12 m6 l6">
                                    <i class="large material-icons">account_circle</i>
                                </div>

                                <div class="col s12 m6 l6">
                                    <span class="card-title" style="margin-top:15px;">Usuarios</span>
                                    <h5><?php echo App\Models\User::count() ?></h5>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col s12 m4 l4">
                    <a href="trabaja_nosotros.php">
                        <div class="card dark">
                            <div class="card-content white-text center">
                                <div class="col s12 m6 l6">
                                    <i class="large material-icons">folder_open</i>
                                </div>

                                <div class="col s12 m6 l6">
                                    <span class="card-title" style="margin-top:15px;">CV cargados</span>
                                    <h5>0</h5>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>

                <div class="col s12 m4 l4">
                    <a href="listar_productos.php">
                        <div class="card dark">
                            <div class="card-content white-text center">
                                <div class="col s12 m6 l6">
                                    <i class="large material-icons">widgets</i>
                                </div>

                                <div class="col s12 m6 l6">
                                    <span class="card-title" style="margin-top:15px;">Productos</span>
                                    <h5><?php echo App\Models\Product::count() ?></h5>
                                </div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            <div class="row">
                <div class="col s12">
                    <br>
                    <h4>Destacados</h4>
                    <br>
                </div>
                <div class="col s12 m3">
                    <div class="card">
                        <div class="card-image">
                            <img src="../assets/images/servicios/13.jpg">
                            <span class="card-title">Card Title</span>
                        </div>
                        <div class="card-content">
                            <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                        </div>
                    </div>
                </div>

                <div class="col s12 m3">
                    <div class="card">
                        <div class="card-image">
                            <img src="../assets/images/servicios/13.jpg">
                            <span class="card-title">Card Title</span>
                        </div>
                        <div class="card-content">
                            <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                        </div>
                    </div>
                </div>

                <div class="col s12 m3">
                    <div class="card">
                        <div class="card-image">
                            <img src="../assets/images/servicios/13.jpg">
                            <span class="card-title">Card Title</span>
                        </div>
                        <div class="card-content">
                            <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                        </div>
                    </div>
                </div>

                <div class="col s12 m3">
                    <div class="card">
                        <div class="card-image">
                            <img src="../assets/images/servicios/13.jpg">
                            <span class="card-title">Card Title</span>
                        </div>
                        <div class="card-content">
                            <p>I am a very simple card. I am good at containing small bits of information. I am convenient because I require little markup to use effectively.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <br><br>
    <?php //include 'layouts/footer.php';?>
    <?php include 'layouts/scripts.php';?>
</body>

</html>

<?php } ?>