<?php 
    require_once __DIR__.'/../../app/Main.php';

    if (!authCheck()) {
        notify('Accesso denegado!!!', 'warning', 'Por favor inicio session');
        header('Location: index.php');
    } else {

        if (isset($_REQUEST['service_id'])) 
            destroyService($_REQUEST['service_id']);

        $services = App\Models\Service::all();

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
                <div class="col s12">
                    <br><br><br>
                    <h4>Listar Servicios</h4>
                    <br>
                </div>

                <table class="striped centered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Imagen</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if ($services->count() == 0) : ?>
                            <tr><td colspan="4">No hay servicios registrados</td></tr>
                        <?php endif ?>
                        <?php foreach ($services as $service) : ?>
                            <tr>
                                <td><?php echo $service->id ?></td>
                                <td>
                                    <img style="width:50px" src="<?php echo '../'.$service->image_path ?>">
                                </td>
                                <td><?php echo $service->name ?></td>
                                <td>
                                    <a href="servicios_registrar.php?id=<?php echo $service->id ?>"
                                        class="waves-effect waves-light btn amber darken-3" 
                                        style="margin-left:10px;">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <button data-id="<?php echo $service->id ?>" 
                                        class="waves-effect waves-light btn btn-delete red darken-3">
                                        <i class="material-icons">delete</i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <form id="delete-form" method="POST" style="display: none;">
                    <input id="service_id" type="hidde" name="service_id" value="">
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
                    $('#service_id').val($(this).data('id'))
                    document.getElementById('delete-form').submit()
                } else {
                    $('#service_id').val('')
                }
            })
        })
    </script>
</body>

</html>

<?php } ?>
