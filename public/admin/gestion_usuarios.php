<?php 
    require_once __DIR__.'/../../app/Main.php';

    if (!authCheck()) {
        notify('Accesso denegado!!!', 'warning', 'Por favor inicio session');
        header('Location: index.php');
    } else {

        if (isset($_REQUEST['user_id'])) 
            deleteUser($_REQUEST['user_id'])
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
                    <h4>Usuarios Registrados</h4>
                    <br>
                </div>
                <a class="waves-effect waves-light btn blue darken-3" style="margin-left:10px;" href="usuario_registrar.php"><i class="material-icons left">group_add</i>Nuevo usuario</a>
                <table class="striped centered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Email</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php foreach (App\Models\User::all() as $user) : ?>
                            <tr>
                                <td><?php echo $user->id ?></td>
                                <td><?php echo $user->name ?></td>
                                <td><?php echo $user->email ?></td>
                                <td>
                                    <?php if (auth()->id != $user->id) : ?>
                                        <a href="usuario_registrar.php?id=<?php echo $user->id ?>"
                                            class="waves-effect waves-light btn amber darken-3" 
                                            style="margin-right:10px;">
                                            <i class="material-icons">edit</i>
                                        </a>
                                        <button data-id="<?php echo $user->id ?>" 
                                            class="waves-effect waves-light btn btn-delete red darken-3">
                                            <i class="material-icons">delete</i>
                                        </button>
                                    <?php endif; ?>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <form id="delete-form" method="POST" style="display: none;">
                    <input id="user_id" type="hidde" name="user_id" value="">
                </form>
            </div>
        </div>
    </div>
    <?php //include 'layouts/footer.php';?>
    <?php include 'layouts/scripts.php';?>
    <script>
        $('.btn-delete').on('click', function () {
            swal({
                title: '¿Estas Seguro?',
                text: 'Esta apunto de eliminar un usuario!',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminarlo!',
                cancelButtonText: 'No, mantenlo'
            }).then((result) => {
                if (result.value) {
                    $('#user_id').val($(this).data('id'))
                    document.getElementById('delete-form').submit()
                } else {
                    $('#user_id').val('')
                }
            })
        })
    </script>
</body>

</html>

<?php } ?>