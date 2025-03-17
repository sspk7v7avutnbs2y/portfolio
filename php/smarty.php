<?php
    require_once '../libs/Smarty.class.php';
    $smarty = new Smarty();

    $smarty->template_dir = '../html/';
    $smarty->compile_dir  = '../templates_c/';
?>