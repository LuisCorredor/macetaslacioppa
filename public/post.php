<?php 
    require_once __DIR__.'/../app/Main.php'; 

    if (isset($_GET['p'])) 
        $news = App\Models\News::FindBySlug($_GET['p']);
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
            <h1>Novedades</h1>
        </div>
    </header>
    <div class="container">
        <div class="inner inner-two-col row"> 
            <div class="col-lg-12 col-md-12">
                <div class="blog-post text-page">
                    <h3><?php echo $news->title ?></h3>
                    <img src="<?php echo $news->image_path ?>" class="main-photo full-width" alt="Blog">
                    <div class="blog-info">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-xs-6">
                                <span class="date"><?php echo $news->setupPublicDta() ?></span>
                            </div>
                            <!--
                            <div class="col-lg-6 col-sm-6 col-xs-6 right">
                                <ul>
                                    <li class="icon-fav"><a href="post.html#"><span class="fa fa-eye"></span>16</a></li>
                                    <li class="icon-comments"><a href="post.html#"><span class="fa fa-commenting-o"></span>14</a></li>
                                </ul>
                            </div>
                            -->
                        </div>
                    </div>
                    <p><?php echo $news->description ?></p>
                    <hr>
                    <div class="tags-short">
                        <strong class="small-upper">Etiquetas:</strong>
                        <?php foreach($news->tags as $tag) : ?>
                            <a href="novedades.php<?php echo '?tag='.$tag->slug ?>">#<?php echo $tag->name ?></a>  
                        <?php endforeach; ?>
                    </div>
                    <ul class="social-small">
                        <li><strong class="small-upper">Te gusta el post?:</strong></li>
                        <li>
                            <div class="fb-like" data-href="http://macetaslacioppa.com.ar" data-layout="button" data-action="like" data-size="small" data-show-faces="true" data-share="true"></div>
                        </li>
                    </ul>
                </div>
                <div id="comments" class="comments-area">
                    <div class="fb-comments" data-href="http://macetaslacioppa.com.ar" data-numposts="20" data-order-by="reverse_time" data-width="100%"></div>
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

    <div id="fb-root"></div>
    <script>(function(d, s, id) {
      var js, fjs = d.getElementsByTagName(s)[0];
      if (d.getElementById(id)) return;
      js = d.createElement(s); js.id = id;
      js.src = "//connect.facebook.net/es_ES/sdk.js#xfbml=1&version=v2.10";
      fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>


</body>

</html>