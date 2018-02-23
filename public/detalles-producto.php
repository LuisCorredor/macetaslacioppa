<?php 
    require_once __DIR__.'/../app/Main.php'; 

    if(isset($_GET['p']) && !empty($_GET['p'])) {
        $product = App\Models\Product::FindBySlug($_GET['p']);
        $next = App\Models\Product::where('id', '>', $product->id)->first();
        $prev = App\Models\Product::where('id', '<', $product->id)->first();

    } else 
        $product = null;

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
            <h1>Detalle de Producto</h1>
        </div>
    </header>


    <!-- CONTENIDO -->

    <div class="container">
            <div class="inner">
                <section id="catalog" style="text-align: left !important;">
                    <h2 class="header-left inner-margin"><?php echo $product->name ?></h2>
                    <br>
                    <div class="row items swiper-container" id="services-slider">
                        <div class="swiper-wrapper">
                            <div class="col-md-3 col-sm-4 col-ms-6 col-xs-12 swiper-slide">
                                <!--
                                <h4>Grass Toping</h4>
                                <p>Nunc egestas pellentesque aliquam. Aliquam vehicula odio at tristique semper. </p>
                                <a href="#" class="btn btn-green btn-xs">read more</a>
                                -->
                            </div>
                            <?php foreach ($product->images as $image) : ?>
                                <div class="col-md-3 col-sm-4 col-ms-6 col-xs-12 swiper-slide">
                                    <div class="icon"><img src="<?php echo $image->image_path ?>"></div>
                                </div>
                            <?php endforeach; ?>               
                        </div>
                        <?php if ($product->images->count() > 1) : ?> 
                        <center>
                            <div class="navigation" style="margin-top: 20px;">
                                <a href="#" class="arrow-left fa fa-chevron-left" style="display: inline-block"></a>
                                <a href="#" class="arrow-right fa fa-chevron-right" style="display: inline-block"></a>
                            </div>   
                        </center>
                        <?php endif ?>            
                    </div>
                    <?php if (!empty($product->description)) : ?>
                        <br><br>
                        <p><?php echo $product->description ?></p>
                    <?php endif; ?>
                    <p><b>Medidas:</b><hr></p>
                    <div>

                        <?php
                        foreach ($product->measures as $key => $measure) {
                            echo '<span style="display: inline-block; margin-right: 20px;">'.$measure->measure.'</span>';
                        }
                        ?>   
                    </div>

                    <p>
                        <hr><br>
                        <?php 
                            if ($prev) {
                                echo '<a href="?p='.$prev->slug.'" class="btn btn-xs btn-green">Anterior</a>';
                            } else
                                echo '<a href="#" class="btn disabled btn-xs btn-green">Anterior</a>';

                            if ($next) {
                                echo '<a href="?p='.$next->slug.'" class="btn btn-xs btn-green">Siguiente</a>';
                            } else
                                echo '<a href="#" class="btn disabled btn-xs btn-green">Siguiente</a>'; 
                        
                        ?>
                    </p>

                </section>
            </div>
        </div>

    <!-- FIN CONTENIDO -->


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
