<?php 
    require_once __DIR__.'/../app/Main.php'; 

    if(isset($_GET['p']) && !empty($_GET['p'])) {
        $category = App\Models\Category::FindBySlug($_GET['p']);
        $products = $category->products;
    } else {
        $products = App\Models\Product::all();
    }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" type="image/png" href="assets/images/favicon.png">
    <title>Macetas La Cioppa</title>
    <link href="assets/css/bootstrap-grid.css" rel="stylesheet">
    <link href="assets/css/font-awesome.css" rel="stylesheet">
    <link href="assets/css/swiper.css" rel="stylesheet">
    <link href="assets/css/swipebox.css" rel="stylesheet">
    <link href="assets/css/zoomslider.css" rel="stylesheet">
    <link href="assets/css/style.css" rel="stylesheet">
    <link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/smoothness/jquery-ui.css">
    <link href="https://fonts.googleapis.com/css?family=Fira+Sans+Condensed:700,800%7COpen+Sans:400,600,700" rel="stylesheet">
    <script type="text/javascript" src="assets/js/modernizr-2.6.2.min.js"></script>
</head>

<body>
    
    <?php include("menu.php") ?>

    <header class="page-header" style="background-image: url(assets/images/_inner-bg.jpg);">
        <div class="container">
            <h1>Productos</h1>
        </div>
    </header>


    <!-- CONTENIDO -->
    <div class="container">
        <div class="inner inner-two-col row">
            <div class="text-page">
                <style>
                    .frame-boxes div {
                        padding: 20px;
                        border-radius: 8px;
                        border: 2px solid #d5d5d5;
                        margin-bottom: 25px;
                        cursor: pointer;
                        height: 380px;
                    }
                    .frame-boxes div:hover {
                        border: 2px solid #92C43D;
                    }
                    .frame-boxes h3 {
                        margin-top: 0px !important;
                    }
                    .frame-boxes img {
                        max-height: 270px;
                    }
                </style>
                <script>
                    function abrirProducto(e) {
                        $(location).attr('href', 'detalles-producto.php?p=' + e);
                    }
                </script>
                <h2 class="no-bg margin-top-0"><span class="black">Fibrocemento</span></h2>
                <div class="row">
                    <?php foreach ($products as $product) : ?>
                    <div class="col-sm-6 col-md-3 frame-boxes">
                        <div id="tetris" onclick="abrirProducto('<?php echo $product->slug ?>')">
                            <h3><?php echo $product->name ?></h3>
                            <img src="<?php echo $product->images->first()->image_path ?>" class="full-width">
                        </div>
                    </div>
                    <?php endforeach; ?>
                    <?php if ($products->count() == 0) : ?>
                    <div class="center">
                            <h3>No hay productos publicadas</h3>
                        </div>
                    <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
    <!-- FIN DE CONTENIDO -->

    <?php include("footer.php") ?>

    <script>
    var base_href = '/';
    </script>
    <script type="text/javascript" src="assets/js/jquery.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
    <script type="text/javascript" src="assets/js/plugins.js"></script>
    <script src="assets/js/map-style.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCTRSHf8sjMCfK9PHPJxjJkwrCIo5asIzE"></script>
    <script type="text/javascript" src="assets/js/scripts.js"></script>
    <script type="text/javascript" src="assets/js/jquery.pixlayout.min.js"></script>
</body>

</html>
