<?php
    // xử lý root url
    if(!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] == 'on'){
    }else{
        $root='https://'.$_SERVER['HTTP_HOST'];
    }

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

    //tu dong load config
    $configs_dir=scandir('config');
    if(!empty($configs_dir)){
        foreach($configs_dir as $item){
            if($item!='.' && $item!='..' && file_exists('config/'.$item)){
                require_once 'config/'.$item;
            }
        }
    }
    require_once './core/Route.php'; //load Route class
    require_once './app/App.php'; //load app


    // loc nhung item chua dien du lieu
    if(!empty($config['database'])){
        $db_config=array_filter($config['database']);
        if(!empty($db_config)){
            require_once 'core/Connection.php';
            require_once 'core/Database.php';
        }
    }
    
    require_once 'core/Model.php';
    require_once './core/Controller.php'; //load base controller