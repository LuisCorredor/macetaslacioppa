<?php 
    require_once __DIR__.'/../../app/Main.php';

    if (!authCheck()) notify('Accesso denegado!!!', 'warning', 'Por favor inicio session');
    else {
        $_SESSION['auth'] = null;
    }

    header('Location: index.php');
?>