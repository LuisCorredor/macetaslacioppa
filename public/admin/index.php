<?php 
    require_once __DIR__.'/../../app/Main.php';

    if (authCheck()) header('Location: principal.php');

    if (isset($_REQUEST['submit'])) autentication($_REQUEST);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'layouts/header.php';?>
</head>

<body class="backFondo">
    <div class="row">
        <div class="col s8 offset-s2 back">
            <center>
                <img src="../assets/images/logo-light.png" class="logoSession">
            </center>

            <form class="col s12 form-session" autocomplete="off" method="post">
                <div class="row">
                    <div class="input-field col s12">
                        <i class="material-icons prefix">account_circle</i>
                        <input name="email" id="email" type="text" class="validate">
                        <label for="email">Correo</label>
                    </div> 
                               
                    <div class="input-field col s12">
                        <i class="material-icons prefix">lock</i>
                        <input name="password" id="password" type="password" class="validate">
                        <label for="password">Contraseña</label>
                    </div>
                    
                    
                    <center>
                        <button class="waves-effect waves-light btn light-green darken-2" 
                                style="margin-top:20px; margin-bottom:50px;"
                                name="submit"
                                value="true"
                                type="submit">Ingresar</button>
                    </center>
                </div>
            </form>
        </div>
    </div>
    
    <?php include 'layouts/scripts.php';?>
</body>

</html>
