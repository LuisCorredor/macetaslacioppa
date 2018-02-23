<?php 
    require_once __DIR__.'/../app/Main.php';

    if (isset($_REQUEST['submit'])) {
        if (empty($_FILES['file_path']['name']))
            notify('Falta CV', 'warning', 'Porfavor agregue tu archivo ');
        elseif ($_FILES['file_path']['type'] != 'application/pdf') 
            notify('Atención', 'warning', 'El archivo no es valido solo PDF y DOC');
        else
            storeJob($_REQUEST, $_FILES['file_path']);
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
            <h1>Trabaja con nosotros</h1>
        </div>
    </header>

    <div class="container">
            <div class="inner inner-two-col row">
                <div class="col-lg-12 col-md-12 text-page">
                    <div class=" contact-form">
                        <h4 class="comments-form-title" align="center">Trabaja con nosotros</h4>
                        <p align="center">Siempre estamos en la búsqueda de nuevas incorporaciones al staff. Mandanos tu cv, queremos conocerte :)</p>
                        <br><br>
                        <div class="comments-form-wrap">
                            <a class="anchor" id="comments-form"></a>
                            <div class="comments-form anchor">
                                <div id="respond" class="comment-respond">
                                    <form  method="post" enctype="multipart/form-data">
                                        <div class="row">
                                            <div class="form-group comments-field col-sm-6">
                                                <input id="nombre" name="nombre" placeholder="Nombre*" value="" size="30" class="ajaxField required" aria-required="true" type="text" required="">
                                            </div>
                                            <div class="form-group comments-field col-sm-6">
                                                <input id="apellido" name="apellido" placeholder="Apellido*" value="" size="30" class="ajaxField required" aria-required="true" type="text" required="">
                                            </div>
                                            <div class="form-group comments-field col-sm-12">
                                                <input id="email" name="email" placeholder="Email*" value="" size="30" class="ajaxField required" aria-required="true" type="text">
                                            </div>
                                            <div class="form-group comments-field col-sm-6">
                                                <input id="nacimiento" name="nacimiento" placeholder="Fecha de Nacimiento*" value="" size="30" class="ajaxField required" aria-required="true" type="text" required="">
                                            </div>
                                            <div class="form-group comments-field col-sm-6">
                                                <input id="nacionalidad" name="nacionalidad" placeholder="Nacionalidad*" value="" size="30" class="ajaxField required" aria-required="true" type="text" required="">
                                            </div>
                                            <div class="form-group comments-field col-sm-6">
                                                <input id="provincia" name="provincia" placeholder="Provincia*" value="" size="30" class="ajaxField required" aria-required="true" type="text" required="">
                                            </div>
                                           <div class="form-group comments-field col-sm-6">
                                                <input id="localidad" name="localidad" placeholder="Localidad*" value="" size="30" class="ajaxField required" aria-required="true" type="text" required="">
                                            </div>
                                            <div class="form-group comments-field col-sm-6">
                                                <input id="telefono" name="telefono" placeholder="Telefono*" value="" size="30" class="ajaxField required" aria-required="true" type="text" required="">
                                            </div>
                                            <div class="form-group comments-field col-sm-6">
                                                <input id="web" name="web" placeholder="Sitio web" value="" size="30" class="ajaxField required" aria-required="true" type="text" required="">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <textarea id="comment" name="comment" placeholder="Contanos sobre vos*" aria-required="true" class="ajaxField required"></textarea>
                                        </div>
                                        <div class="form-group">
                                            <label for="exampleInputFile">Carga tu CV</label>
                                            <input name="file_path" type="file" id="exampleInputFile">
                                        </div>
                                        <div class="row">
                                            <div class="form-group comments-field col-sm-12">
                                                <input id="area" name="area" placeholder="Area de Interes" value="" size="30" class="ajaxField required" aria-required="true" type="text" required="">
                                            </div>
                                        </div>
                                        <input name="submit" id="send_comment" class="submit aligncenter btn btn-green" value="Enviar" type="submit">
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
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
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@7.3.5/dist/sweetalert2.all.min.js"></script>
    <?php if (isset($_SESSION['flash'])) : ?>
        <script>
            swal({
                title: "<?php echo $_SESSION['flash']['title'] ?>",
                type: "<?php echo $_SESSION['flash']['type'] ?>",
                text: "<?php echo $_SESSION['flash']['text'] ?>",
                howConfirmButton: false
            })
        </script>
    <?php $_SESSION['flash'] = null; endif; ?>
</body>

</html>
