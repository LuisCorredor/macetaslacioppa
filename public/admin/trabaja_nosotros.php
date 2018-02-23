<?php 
    require_once __DIR__.'/../../app/Main.php';

    if (!authCheck()) {
        notify('Accesso denegado!!!', 'warning', 'Por favor inicio session');
        header('Location: index.php');
    } else {
        
        if (isset($_REQUEST['cv_id'])) 
            destroyJob($_REQUEST['cv_id']);
        
        $jobs = App\Models\JobApplication::all();
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
                    <h4>Listado de CV enviados</h4>
                    <br>
                </div>

                <table class="striped centered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Nombre</th>
                            <th>Correo electronico</th>
                            <th>Area de interes</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if ($jobs->count() == 0) : ?>
                            <tr><td colspan="5">No hay CV registrados</td></tr>
                        <?php endif ?>
                        <?php foreach ($jobs as $job) : ?>
                        <tr>
                            <td><?php echo $job->id ?></td>
                            <td><?php echo $job->first_name.' '.$job->last_name ?></td>
                            <td><?php echo $job->email ?></td>
                            <td><?php echo $job->interest ?></td>
                            <td>
                                <a href="../<?php echo $job->file_path ?>"
                                    class="waves-effect waves-light btn" 
                                    style="margin-left:10px;"
                                    target="_blank">Ver CV</a>
                                <button data-id="<?php echo $job->id ?>" 
                                    class="waves-effect waves-light btn btn-delete red darken-3">
                                    <i class="material-icons">delete</i>
                                </button>
                                <!--
                                <a class="waves-effect waves-light btn red darken-3"><i class="material-icons left">delete</i>Eliminar</a>
                                <a class="waves-effect waves-light btn amber darken-3" style="margin-left:10px;"><i class="material-icons left">edit</i>Editar</a>
                                -->
                            </td>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <form id="delete-form" method="POST" style="display: none;">
                    <input id="cv_id" type="hidde" name="cv_id" value="">
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
                    $('#cv_id').val($(this).data('id'))
                    document.getElementById('delete-form').submit()
                } else {
                    $('#cv_id').val('')
                }
            })
        })
    </script>
</body>

</html>

<?php } ?>