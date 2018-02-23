<?php 
    require_once __DIR__.'/../../app/Main.php';

    if (!authCheck()) {
        notify('Accesso denegado!!!', 'warning', 'Por favor inicio session');
        header('Location: index.php');
    } else {

        if (isset($_REQUEST['product_id'])) 
            destroyProduct($_REQUEST['product_id']);

        if (isset($_GET['c_id']) && !empty($_GET['c_id'])) {
            $category = App\Models\Category::with('products')->find($_GET['c_id']); 
            $products = $category->products;
        } else {
            $products = App\Models\Product::all();
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
                    <h4>Listar Productos</h4>
                    <br>
                </div>

                <div class="right">
                    <a class="waves-effect waves-light btn amber darken-3" href="productos_registrar.php<?php echo isset($category) ? '?c_id='.$category->id : '' ?>">
                        <?php echo isset($category) ? 'Nuevo producto de '.$category->name : 'Nuevo producto' ?>
                    </a>
                </div>
                <table class="striped centered">
                    <thead>
                        <tr>
                            <th>Id</th>
                            <th>Imagen</th>
                            <th>Categoria</th>
                            <th>Nombre</th>
                            <th>Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        <?php if ($products->count() == 0) : ?>
                            <tr><td colspan="5">No hay productos registrados</td></tr>
                        <?php endif ?>
                        <?php foreach ($products as $product) : ?>
                            <tr>
                                <td><?php echo $product->id ?></td>
                                <td>
                                    <img style="width:50px" src="<?php echo '../'.$product->images->first()->image_path ?>">
                                </td>
                                <td><?php echo $product->category->name ?></td>
                                <td><?php echo $product->name ?></td>
                                <td>
                                    <a href="productos_registrar.php?id=<?php echo $product->id ?>" 
                                        class="waves-effect waves-light btn amber darken-3" 
                                        style="margin-left:10px;">
                                        <i class="material-icons">edit</i>
                                    </a>
                                    <button data-id="<?php echo $product->id ?>" 
                                        class="waves-effect waves-light btn btn-delete red darken-3">
                                        <i class="material-icons">delete</i>
                                    </button>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
                <form id="delete-form" method="POST" style="display: none;">
                    <input id="product_id" type="hidde" name="product_id" value="">
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
                    $('#product_id').val($(this).data('id'))
                    document.getElementById('delete-form').submit()
                } else {
                    $('#product_id').val('')
                }
            })
        })
    </script>
</body>

</html>

<?php } ?>