<?php 
    require_once __DIR__.'/../../app/Main.php';

    if (!authCheck()) {
        notify('Accesso denegado!!!', 'warning', 'Por favor inicio session');
        header('Location: index.php');
    } else {
        if (isset($_GET['id'])) {
            $user = App\Models\User::find($_GET['id']);
            if (isset($_REQUEST['submit-edit']))
                editUserData($_REQUEST);
        } else {
            if (isset($_REQUEST['submit']))
                userCreate($_REQUEST);
        }
        

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
                <div class="col s12" style="padding: 15px 0">
                    <?php if (!isset($_GET['id'])) : ?>
                        <h4>Registrar usuario</h4>
                    <?php else: ?>
                        <h4>Editar usuario</h4>
                    <?php endif; ?>
                </div>

                <form class="col s12 form-producto" method="POST">
                    <div class="row">
                        <?php if (!isset($_GET['id'])) : ?>
                        <p class="card-panel teal lighten-2">
                            Para esta nuevo usuarios la contraseña es la siquiente:
                            <b>1234</b>
                        </p>
                        <?php endif; ?>
                        <div class="input-field col s6">
                            <input name ="name" id="name" type="text" class="validate"
                            value="<?php echo isset($user) ? $user->name : '' ?>">
                            <label for="name">Nombre</label>
                        </div>
                        
                        <div class="input-field col s6">
                            <input name ="email" id="email" type="text" class="validate"
                            value="<?php echo isset($user) ? $user->email : '' ?>">
                            <label for="email">Email</label>
                        </div>

                        <?php if (isset($_GET['id'])) : ?>
                            <input name ="user_id" type="hidden" value="<?php echo $_GET['id'] ?>">
                        <?php endif; ?>
                        <div class="right" style="padding-top: 15px;">
                            <button class="waves-effect waves-light btn"
                                    name="<?php echo isset($_GET['id']) ? 'submit-edit' : 'submit' ?>"
                                    value="true"
                                    type="submit">
                                <?php echo isset($_GET['id']) ? 'Editar' : 'Registrar' ?>
                            </button>
                            <a href="gestion_usuarios.php" 
                                class="waves-effect waves-light btn red">
                                Cancelar
                            </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <?php //include 'layouts/footer.php';?>
    <?php include 'layouts/scripts.php';?>
</body>

</html>

<?php } ?>
