<?php 
    require_once __DIR__.'/../../app/Main.php';

    if (!authCheck()) {
        notify('Accesso denegado!!!', 'warning', 'Por favor inicio session');
        header('Location: index.php');
    } else {

        if (isset($_GET['id'])) {
            $category = App\Models\Category::find($_GET['id']);

            if (isset($_REQUEST['submit-edit']))
                updateCategory($_REQUEST, $_FILES['image_path']);

        } else {
            if (isset($_REQUEST['submit'])) {
                if (empty($_FILES['image_path']['name']))
                    notify('Falta Imagen', 'warning', 'Porfavor agregue una imagen');
                else
                    storeCategory($_REQUEST, $_FILES['image_path']);
            }
        }

        
?>
<!DOCTYPE html>
<html lang="es">

<head>
    <?php include 'layouts/header.php';?>
    <style>
        .render-image,
        #file-render{
            min-height: 250px;
            background-image: url('../storage/default.jpg');
            background-position: center; 
            background-size: cover;

        }

        #file-render{
            background-image: none;
        }
    </style>
</head>

<body>
    <?php include 'layouts/nav.php';?>
    <div class="row">
        <div class="col s9 offset-s3">
            <div class="row">
                <div class="col s12" style="padding: 15px 0">
                    <?php if (!isset($_GET['id'])) : ?>
                        <h4>Registrar categoría de productos</h4>
                    <?php else: ?>
                        <h4>Editar categoría de productos</h4>
                    <?php endif; ?>
                </div>

                <div class="row">
                    <form  method="post" enctype="multipart/form-data">
                        <div class="col s3">
                            <div class="file-field input-field">
                                <div class="render-image">
                                    <div id="file-render"></div>
                                    <input id="file-upload" 
                                        name="image_path" 
                                        type="file" 
                                        accept="image/*" 
                                        onchange="return readFile( this.files );">
                                </div>
                            </div>
                        </div>
                        <div class="col s9">
                            <div class="input-field col s12">
                                <input name="name" 
                                    value="<?php echo isset($category) ? $category->name : '' ?>" 
                                    id="name" type="text" class="validate">
                                <label for="name">Nombre</label>
                            </div>
                            <div class="input-field col s12">
                                <input name="description" 
                                    value="<?php echo isset($category) ? $category->description : '' ?>" 
                                    id="description" type="text" class="validate">
                                <label for="description">Descripción</label>
                            </div>
                            <?php if (isset($_GET['id'])) : ?>
                                <input name ="category_id" type="hidden" value="<?php echo $_GET['id'] ?>">
                            <?php endif; ?>
                            <div class="right">
                                <button class="waves-effect waves-light btn"
                                    name="<?php echo isset($_GET['id']) ? 'submit-edit' : 'submit' ?>"
                                    value="true"
                                    type="submit">
                                    <?php echo isset($_GET['id']) ? 'Editar' : 'Registrar' ?>
                                </button>
                                <a href="listar_categorias.php" 
                                    class="waves-effect waves-light btn red">
                                    Cancelar
                                </a>
                            </div>
                        </div>
                    </form>  
                </div>
            </div>
        </div>
    </div>
    <?php //include 'layouts/footer.php';?>
    <?php include 'layouts/scripts.php';?>
    <script>
        var src = "<?php echo isset($category) ? '../'.$category->image_path : '' ?>"
        if (src) {
            $('#file-render').css('border', '5px solid #92C43D')
            $('#file-render').css('background-color', 'white')
            $('#file-render').css('background-image', 'url(' + src + ')')
        }


        function readFile(input) {

            if (input && input[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#file-render').css('border', '5px solid #92C43D')
                    $('#file-render').css('background-color', 'white')
                    $('#file-render').css('background-image', 'url(' + e.target.result + ')')
                }

                reader.readAsDataURL(input[0]);
            }
        }
    </script>
</body>

</html>

<?php } ?>