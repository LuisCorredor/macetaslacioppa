<?php 
    require_once __DIR__.'/../app/Main.php'; 

    if (isset($_GET['tag'])) {
        $tag = App\Models\Tag::FindBySlug($_GET['tag']);
        $news = $tag->news;
    } else 
        $news = App\Models\News::all();


    $paginate = paginator($news, $_GET, 4);

    $tags = App\Models\Tag::with('news')->get();

    $n = App\Models\News::all();
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
            <div class="col-lg-8 col-md-8 text-page">
                <div class="blog">

                    <div class="row">
                        <?php foreach($paginate['data'] as $new) : ?>
                        <div class="col-lg-6 col-md-6 col-sm-12 a-a-a">
                            <div class="item matchHeight">
                                <a href="post.php<?php echo '?p='.$new->slug ?>" class="photo"><img src="<?php echo $new->image_path ?>" class="full-width" alt="Blog"></a>
                                <div class="description">
                                    <a href="post.php<?php echo '?p='.$new->slug ?>" class="header"><h4><?php echo $new->title ?></h4></a>
                                    <p class="text">
                                        <?php echo substr($new->description, 0, 140) ?>
                                    </p>
                                </div>
                                <div class="blog-info">
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-12  col-xs-6">
                                            <b style="color: #656774">Publicada:</b>
                                            <a href="post.php<?php echo '?p='.$new->slug ?>" class="date">
                                                <?php echo $new->setupPublicDta() ?>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <?php endforeach; ?>
                        <?php if ($n->count() == 0) : ?>
                        <div class="center">
                            <h3>No hay novedades publicadas</h3>
                        </div>
                        <?php endif; ?>
                    </div>
                    <?php if ($n->count() != 0) : ?>
                        <div class="paging-navigation navigation">
                            <hr>
                            <div class="pagination">
                                <a href="<?php echo $paginate['prev_page_url'] ?>" 
                                    class="arrow-left prev <?php echo !$paginate['prev_page_url'] ? 'disabled' : '' ?> fa fa-chevron-left"></a>
                                <?php for($i = 0; $i < $paginate['total']/$paginate['per_page']; $i++) : ?>
                                    <a href="?page=<?php echo $i+1; echo dataGetUri($_GET) ?>" class="page-numbers <?php echo $i+1 == $paginate['current_page'] ? 'current' : ''?>">
                                        <?php echo $i+1 ?>
                                    </a>
                                <?php endfor; ?>
                                <a href="<?php echo $paginate['next_page_url'] ?>" 
                                    class="arrow-right next <?php echo !$paginate['next_page_url'] ? 'disabled' : '' ?> fa fa-chevron-right"></a>
                            </div>
                        </div>
                    <?php endif; ?>
                </div>
            </div>

            <div class="col-lg-4 col-md-4">
                <div class="widget-area" role="complementary">
                    <aside class="widget">
                        <h4>Etiquetas</h4>
                        <ul>
                            <li class="<?php echo !isset($_GET['tag']) ? 'current-cat' : '' ?>">
                                <a href="">
                                    Todo (<?php echo $n->count() ?>)
                                </a>
                            </li>
                            <?php 
                                foreach($tags as $tag) : 
                                    $class = isset($_GET['tag']) && $tag->slug == $_GET['tag'] ? 'current-cat' : '';
                            ?>
                                <li class="<?php echo $class ?>">
                                    <a href="novedades.php<?php echo '?tag='.$tag->slug ?>">
                                        <?php echo $tag->name ?>
                                        (<?php echo $tag->news->count() ?>)
                                    </a>
                                </li>
                            <?php endforeach; ?>
                        </ul>
                    </aside>
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
