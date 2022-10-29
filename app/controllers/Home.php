<?php
    class Home extends Controller{

        public $model_home;

        public function __construct(){
            $this->model_home=$this->model('HomeModel');
        }

        public function index(){
            echo 'trang chu';
        }
        
        public function list(){
            $data=$this->model_home->getList();
            //echo '<pre>';print_r($data);echo '</pre>';

            // render view
            $this->render('products/list',$data);
        }

    }