<?php
    class Controller{

        public function model($model){
            if(file_exists('app/models/'.$model.'.php')){
                require_once 'app/models/'.$model.'.php';
                if(class_exists($model)){
                    $model=new $model(); 
                    return $model;
                }
            }
            return false;
        }
    }