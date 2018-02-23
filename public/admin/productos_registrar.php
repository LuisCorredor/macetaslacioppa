<?php 
    require_once __DIR__.'/../../app/Main.php';

    if (!authCheck()) {
        notify('Accesso denegado!!!', 'warning', 'Por favor inicio session');
        header('Location: index.php');
    } else {

        if (isset($_REQUEST['submit'])) {
            if (empty($_FILES['image_path']['name']))
                    notify('Falta Imagen', 'warning', 'Porfavor agregue una imagen');
            else {
                storeProduct($_REQUEST, $_FILES['image_path']);
            }
                

        } elseif (isset($_REQUEST['submit-edit'])) {
            updateProduct($_REQUEST, $_FILES['image_path']);
        }

        $categories = App\Models\Category::pluck('name', 'id');

        if (isset($_GET['id'])) {
            $product = App\Models\Product::find($_GET['id']);
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
                        <h4>Registrar producto</h4>
                    <?php else: ?>
                        <h4>Editar producto</h4>
                    <?php endif; ?>
                    <i class="material-icons tooltipped" data-position="right" data-delay="50" data-tooltip="Formulario de registro de productos, por favor llenar los campos marcados con (*)">bug_report</i>
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

                            <div class="input-field col s6">
                                <input name="name" value="<?php echo isset($product) ? $product->name : '' ?>" id="name" type="text" class="validate">
                                <label for="name">Nombre</label>
                            </div>

                            <div class="input-field col s6">
                                <select name="category_id">
                                    <option value="" disabled <?php echo !isset($_GET['c_id']) || !isset($_GET['id']) ? 'selected' : '' ?>>Categoría</option>
                                    <?php foreach ($categories as $value => $text) : ?>
                                        <option value="<?php echo $value ?>" 
                                            <?php echo isset($_GET['c_id']) && $value == $_GET['c_id'] ? 'selected' : '' ?>
                                            <?php echo isset($_GET['id']) && $value == $product->category_id ? 'selected' : '' ?>>
                                            <?php echo $text ?>
                                        </option>
                                    <?php endforeach; ?>
                                </select>
                            </div>

                            <div class="input-field col s12">
                                <textarea name="description" id="textarea1" class="materialize-textarea">
                                    <?php echo isset($product) ? $product->description : '' ?>
                                </textarea>
                                <label for="textarea1">Descripción</label>
                            </div>

                            <div class="input-field col s12">
                                <input name="measures" id="measures" type="text" class="validate" style="margin-bottom: 5px;" value="
                                <?php
                                    if (isset($product)) {
                                        $str = '';
                                        foreach ($product->measures as $measure) {
                                            $str .=$measure->measure.'; ';
                                        }
                                        echo substr($str, 0, -2);
                                    }
                                ?>
                                ">
                                <label for="measures">Medidas</label>
                                <p style="margin-top: 0; font-size: 12px; color: #9e9e9e">Las medidas deben ir separadas por <b>;</b> <br> <b>Ej:</b> 00 x 00 x 00; 01 x 01 x 01</p>
                            </div>

                            <?php if (isset($product)) : ?>
                                <input type="hidden" name="id" value="<?php echo $product->id ?>">
                            <?php endif ?>

                            <div class="right">
                                <button class="waves-effect waves-light btn"
                                    name="<?php echo isset($_GET['id']) ? 'submit-edit' : 'submit' ?>"
                                    value="true"
                                    type="submit">
                                    <?php echo isset($_GET['id']) ? 'Editar' : 'Registrar' ?>
                                </button>
                                <a href="listar_productos.php" 
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
        var src = "<?php echo isset($product) ? '../'.$product->images->first()->image_path : '' ?>"
        if (src) {
            $('#file-render').css('background-color', 'white')
            $('#file-render').css('background-size', 'cover')
            $('#file-render').css('background-position', 'center')
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
