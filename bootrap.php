<?php
    // xử lý root url
    if(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on'){
    }else{
        $root='https://'.$_SERVER['HTTP_HOST'];
    }
    // echo $root;

    // echo $_SERVER['DOCUMENT_ROOT'].'<br/>';
    // echo __DIR__.'<br/>';

    // xu ly dau '/' va '\' cho giong nhau de dung str_replace

    if(strpos(__DIR__,'\\')!==false){
        $folder_root=str_replace('\\','/',__DIR__);
    }else{
        $folder_root=__DIR__;
    }

    $folder=str_replace($_SERVER['DOCUMENT_ROOT'],'',$folder_root);
    $root=$root.'/'.$folder;
    // echo $root;

    // phải dùng define thi mơi dua bien root sang file khac duoc
    define('__WEB_ROOT__',$root);


    require_once './config/routes.php';
    require_once './core/Route.php';
    require_once './app/App.php'; //load app
    require_once './core/Controller.php'; //load base controller