<?php 
    require_once __DIR__.'/../../app/Main.php';

    if (!authCheck()) {
        notify('Accesso denegado!!!', 'warning', 'Por favor inicio session');
        header('Location: index.php');
    } else {

    if (isset($_REQUEST['submit-password'])) {
        if (empty($_REQUEST['password']) || empty($_REQUEST['password_confirmation']))
            notify('Verifique los datos', 'warning', 'Por favor ingrese la contraseña y su confirmacion');
        elseif ($_REQUEST['password'] != $_REQUEST['password_confirmation'])
            notify('Verifique los datos', 'warning', 'La contraseña y su confirmacion no coninciden');
        else
            userUpdatePassword($_REQUEST);
    }elseif (isset($_REQUEST['update-profile']))
        editUserData($_REQUEST);
    elseif(isset($_REQUEST['submit-file'])) 
        uploadProfileImg($_FILES['avatar']);
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'layouts/header.php';?>
    <style>
        .input-avatar,
        #file-render{
            border: 1px solid #92C43D;
            min-height: 150px;
            max-width: 150px;
            border-radius: 100%;
            background-size: cover;
        }
    </style>
</head>

<body>
    <?php include 'layouts/nav.php';?>
    <div class="row">
        <div class="col s9 offset-s3">
            <div class="row">
                <div class="col s12" style="padding: 15px 0">
                    <h4>Mis perfil</h4>
                </div>
                <div class="col s3 ">
                    <form method="post" enctype="multipart/form-data">
                        <div class="file-field input-field">
                            <div class="input-avatar" style="background-image: url('<?php echo avatar() ?>')">
                                <div id="file-render"></div>
                                <input id="file-upload" 
                                    name="avatar" 
                                    type="file" 
                                    accept="image/*" 
                                    onchange="return readFile( this.files );">
                            </div>
                        </div>
                        <div id="submit-content" style="padding-left: 38px; display: none">
                            <button class="waves-effect waves-light btn amber darken-3"
                                        style="margin-top:20px; margin-bottom:50px;"
                                        name="submit-file"
                                        value="true"
                                        type="submit">
                                <i class="material-icons">save</i>
                            </button>
                        </div>
                    </form>
                </div>
                
                <div class="col s4">
                    <h5>Datos de usuario</h5>
                    <?php if (!isset($_REQUEST['edit-profile'])): ?>
                    <p>Nombre: <?php echo auth()->name; ?></p>
                    <p>Email: <?php echo auth()->email; ?></p>
                    <form class="colform-session" autocomplete="off" method="post">
                        <button class="waves-effect waves-light btn amber darken-3"
                                style="margin-top:20px; margin-bottom:50px;"
                                name="edit-profile"
                                value="true"
                                type="submit">
                            <i class="material-icons left">edit</i>Editar
                        </button>
                    </form>
                    <?php else: ?>
                    <form class="colform-session" autocomplete="off" method="post">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">account_circle</i>
                            <input name="name" id="name" type="text" class="validate" value="<?php echo auth()->name; ?>">
                            <label for="name">Nombre</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">email</i>
                            <input name="email" id="email" type="text" class="validate" value="<?php echo auth()->email; ?>">
                            <label for="email">Email</label>
                        </div>
                        <div class="center">
                            <button class="waves-effect waves-light btn amber darken-3"
                                    style="margin-top:20px; margin-bottom:50px;"
                                    name="update-profile"
                                    value="true"
                                    type="submit">
                                <i class="material-icons left">edit</i>Guardar
                            </button>
                        </div>
                    </form>
                    <?php endif; ?>
                </div>

                <div class="col s4">
                    <h5>Cambio de contraseña</h5>
                    <form class="colform-session" autocomplete="off" method="post">
                        <div class="input-field col s12">
                            <i class="material-icons prefix">lock</i>
                            <input name="password" id="password_" type="password" class="validate">
                            <label for="password">Contraseña</label>
                        </div>
                        <div class="input-field col s12">
                            <i class="material-icons prefix">lock</i>
                            <input name="password_confirmation" id="password_confirmation" type="password" class="validate">
                            <label for="password_confirmation">Confirmacion de contraseña</label>
                        </div>
                        <div class="right">
                        <button class="waves-effect waves-light btn amber darken-3"
                                style="margin-top:20px; margin-bottom:50px;"
                                name="submit-password"
                                value="true"
                                type="submit">Cambiar</button>
                        </div>
                    </form>
                </div>
                
            </div>
        </div>
    </div>
    <?php //include 'layouts/footer.php';?>
    <?php include 'layouts/scripts.php';?>
    <script>
        function readFile(input) {

            if (input && input[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#file-render').css('background-image', 'url(' + e.target.result + ')')
                    $('#submit-content').css('display', 'block')
                }

                reader.readAsDataURL(input[0]);
            }
        }
    </script>
</body>

</html>
<?php } ?>