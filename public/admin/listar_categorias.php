<?php 
    require_once __DIR__.'/../../app/Main.php';

    if (!authCheck()) {
        notify('Accesso denegado!!!', 'warning', 'Por favor inicio session');
        header('Location: index.php');
    } else {

        $categories = App\Models\Category::all();

        if (isset($_REQUEST['category_id'])) 
            destroyCategory($_REQUEST['category_id'])
        
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
                    <h4>Listar Categorías</h4>
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
                        <?php if ($categories->count() == 0) : ?>
                            <tr><td colspan="4">No hay categorias registradas</td></tr>
                        <?php endif ?>
                        <?php foreach ($categories as $category) : ?>
                            <tr>
                                <td><?php echo $category->id ?></td>
                                <td>
                                    <img style="width:50px" src="<?php echo '../'.$category->image_path ?>">
                                </td>
                                <td><?php echo $category->name ?></td>
                                <td>
                                    <a  href="listar_productos.php?c_id=<?php echo $category->id ?>"
                                        class="waves-effect waves-light " 
                                        style="margin-left:10px;">Prodcutos</a>
                                    <a href="categorias_registrar.php?id=<?php echo $category->id ?>"
                                        class="waves-effect waves-light btn amber darken-3" 
                                        style="margin-left:10px;">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <button data-id="<?php echo $category->id ?>" 
                                        class="waves-effect waves-light btn btn-delete red darken-3">
                                        <i class="material-icons">delete</i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <form id="delete-form" method="POST" style="display: none;">
                    <input id="category_id" type="hidde" name="category_id" value="">
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
                    $('#category_id').val($(this).data('id'))
                    document.getElementById('delete-form').submit()
                } else {
                    $('#category_id').val('')
                }
            })
        })
    </script>
</body>

</html>

<?php } ?>