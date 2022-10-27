<?php
    class Home extends Controller{

        public $model_home;

        public function __construct(){
            $this->model_home=$this->model('HomeModel');
        }

        public function index(){
            $data=$this->model_home->getList();
            echo '<pre>';print_r($data);echo '</pre>';
        }

        public function detail($id=0){
            $data=$this->model_home->getDetail($id);
            echo $data;
        }

        public function search(){
            $keyword=$_GET['keyword'];
            echo 'tu khoa:'.$keyword;
        }
    }