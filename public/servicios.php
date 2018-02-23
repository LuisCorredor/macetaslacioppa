<?php 
    require_once __DIR__.'/../app/Main.php'; 

    $services = App\Models\Service::all();

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
            <h1>Servicios</h1>
        </div>
    </header>

    <div class="container">
            <div class="inner inner-two-col row">
                <div class="col-lg-12 col-md-12 text-page">
                    <h2 class="no-bg margin-top-0"><span class="black">Servicios</span></h2>
                    <p class="small">Convertir espacios y jardines en lugares especiales requiere de ciertos fundamentos, decisiones, buen gusto y mano de obra especializada. Cada lugar tiene su propio encanto, por lo cual es necesario maximizarlos, producir los cambios necesarios y mantener su esencia....</p>
                    <p class="small">Nosotros contamos con profesionales formados en dise&ntilde;o de jardines y paisajismo que lo ayudar&aacuten a resolver todo tipo de situaciones en su proyecto integral.</p>
                    <div class="row">
                        <?php foreach ($services as $service) : ?>
                            <div class="col-md-4 frame-boxes" >
                                <h4><?php echo $service->title ?></h4>
                                <img src="<?php echo $service->image_path ?>" class="full-width" alt="Gallery">
                            </div>
                        <?php endforeach; ?>
                        <?php if ($services->count() == 0) : ?>
                            <div class="center">
                                    <h3>No hay servicios publicadas</h3>
                                </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

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
