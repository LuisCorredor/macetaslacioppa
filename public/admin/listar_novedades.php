<?php 
    require_once __DIR__.'/../../app/Main.php';

    if (!authCheck()) {
        notify('Accesso denegado!!!', 'warning', 'Por favor inicio session');
        header('Location: index.php');
    } else {

        if (isset($_REQUEST['new_id'])) 
            destroyNews($_REQUEST['new_id']);

        $news = App\Models\News::all();
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
                    <h4>Listar Novedades</h4>
                    <br>
                </div>

                <table class="striped centered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if ($news->count() == 0) : ?>
                            <tr><td colspan="4">No hay novedades registradas</td></tr>
                        <?php endif ?>
                        <?php foreach ($news as $new) : ?>
                        <tr>
                            <td><?php echo $new->id ?></td>
                            <td><?php echo $new->title ?></td>
                            <td>
                                <a href="novedades_registrar.php?id=<?php echo $new->id ?>"
                                    class="waves-effect waves-light btn amber darken-3" 
                                    style="margin-left:10px;">
                                    <i class="material-icons">edit</i>
                                </a>
                                <button data-id="<?php echo $new->id ?>" 
                                    class="waves-effect waves-light btn btn-delete red darken-3">
                                    <i class="material-icons">delete</i>
                                </button>
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <form id="delete-form" method="POST" style="display: none;">
                    <input id="new_id" type="hidde" name="new_id" value="">
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
                text: 'Esta apunto de eliminar un categoria!',
                type: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Sí, eliminarlo!',
                cancelButtonText: 'No, mantenlo'
            }).then((result) => {
                if (result.value) {
                    $('#new_id').val($(this).data('id'))
                    document.getElementById('delete-form').submit()
                } else {
                    $('#new_id').val('')
                }
            })
        })
    </script>
</body>

</html>

<?php } ?>
