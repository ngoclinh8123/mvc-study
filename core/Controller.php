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

        public function render($view,$data=[]){
            // biến key của mảng thành biến riêng biệt
            extract($data);
            
            if(file_exists('app/views/'.$view.'.php')){
                require_once 'app/views/'.$view.'.php';
            }
        }
    }