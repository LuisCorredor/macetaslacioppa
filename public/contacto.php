<?php 
    require_once __DIR__.'/../app/Main.php'; 

    if (isset($_REQUEST['submit'])){
        sendMailContact(env('MAIL_CONTACT'), $_REQUEST);
        notify('Éxitos', 'success', 'El mensaje se ha enviado');
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
            <h1>Contacto</h1>
        </div>
    </header>
    <section id="page-contacts">
        <div class="container">
            <div class="row">
                <div class="col-md-4 col">
                    <div class="item matchHeight">
                        <span class="fa fa-location-arrow"></span>
                        <p>Dep&oacute;sito y venta:<br>
                        Tres Arroyos 4130, Los Polvorines, Provincia de Bs. As.<br><br>
                        Lunes a Viernes de 9 a 12 hs y 13 a 17 hs.<br>
                        S&aacute;bados de 9 12 hs.
                        </p>
                    </div>
                </div>
                <div class="col-md-4 col">
                    <div class="item matchHeight">
                        <span class="fa fa-phone-square"></span>
                        <p>Tel&eacute;fonos:<br>
                        (011) 4663-2217<br>
                        (011) 4660-0107
                        <br><br>
                        WhatsApp:<br>
                        +54 (011) 15-6620-0653
                        </p>
                    </div>
                </div>
                <div class="col-md-4 col">
                    <div class="item matchHeight">
                        <span class="fa fa-envelope"></span>
                        <p>info@macetaslacioppa.com.ar</p>
                    </div>
                </div>
                <div class="col-lg-12 col-md-12" id="enviarAncla">
                    <div class=" contact-form">
                        <h4 class="comments-form-title">Env&iacute;anos un Mensaje</h4>
                        <p>Ante cualquier consulta o pedido, puede contactarse con nosotros mediante el siguiente formulario que se encuentra a continuaci&oacute;n. A&uacute;n as&iacute;, recuerde que tambi&eacute;n puede llamarnos a cualquiera de los n&uacute;meros de tel&eacute;fono que se especifican m&aacute;s arriba.</p>
                        <div class="comments-form-wrap">
                            <a class="anchor" id="comments-form"></a>
                            <div class="comments-form anchor">
                                <div id="respond" class="comment-respond">
                                    <form method="post">
                                        <div class="row">
                                            <div class="form-group comments-field col-sm-6">
                                                <input id="nombre" name="nombre" placeholder="Nombre" value="" size="30" class="ajaxField required" aria-required="true" type="text">
                                            </div>
                                            <div class="form-group comments-field col-sm-6">
                                                <input id="email" name="email" placeholder="Email" value="" size="30" class="ajaxField required" aria-required="true" type="text">
                                            </div>
                                            <div class="form-group" onchange="seleccionTipo()">
                                                <select id="tipo" class="ajaxField" style="
                                                width: calc(100% - 30px);
                                                font-size: 16px;
                                                display: block;
                                                margin: 0 16px;
                                                background: #ffffff;
                                                padding: 16px 18px;
                                                border: 1px solid #dadada;
                                                -webkit-border-radius: 64px;
                                                -webkit-background-clip: padding-box;
                                                -moz-border-radius: 64px;
                                                -moz-background-clip: padding;
                                                border-radius: 64px;
                                                background-clip: padding-box;
                                                outline: none !important;
                                                " name="type">
                                                    <option>Paisajista</option>
                                                    <option>Vivero</option>
                                                    <option selected>Particular</option>
                                                </select>
                                            </div>
                                            <script type="text/javascript">
                                                function seleccionTipo()
                                                {
                                                    opt = $("#tipo option:selected").val();
                                                    if (opt == "Vivero" || opt == "Paisajista")
                                                    {
                                                        $("#otro").show();
                                                    }
                                                    else
                                                    {
                                                        $("#otro").hide();
                                                    }
                                                }
                                            </script>
                                            <div id="otro" hidden>
                                                <div class="form-group comments-field col-sm-6">
                                                    <input id="empresa" name="empresa" placeholder="Empresa" value="" size="30" class="ajaxField" type="text">
                                                </div>
                                                <div class="form-group comments-field col-sm-6">
                                                    <input id="cuit" name="cuit" placeholder="CUIT" value="" size="30" class="ajaxField" type="text">
                                                </div>
                                            </div>
                                            <div class="form-group comments-field col-sm-6">
                                                <input id="cuit" name="ncuit" placeholder="N&deg; CUIT" value="" size="30" class="ajaxField required" aria-required="true" type="text">
                                            </div>
                                            <div class="form-group comments-field col-sm-6">
                                                <input id="localidad" name="localidad" placeholder="Localidad" value="" size="30" class="ajaxField required" aria-required="true" type="text">
                                            </div>
                                            <div class="form-group comments-field col-sm-6">
                                                <input id="provincia" name="provincia" placeholder="Provincia" value="" size="30" class="ajaxField required" aria-required="true" type="text">
                                            </div>
                                            <div class="form-group comments-field col-sm-6">
                                                <input id="telefono" name="telefono" placeholder="Tel&eacute;fono" value="" size="30" class="ajaxField required" aria-required="true" type="text">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <textarea id="comment" name="comment" placeholder="Tu Mensaje" aria-required="true" class="ajaxField required"></textarea>
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
    </section>
    <!-- Set google map coords and API key to yours -->
    <div id="map" data-lat="-34.4911186" data-lng="-58.6939108" data-zoom="15"></div>
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
