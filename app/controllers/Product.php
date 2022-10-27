<?php
    class Product extends Controller{

        public $model_product;

        public function __construct() {
            $this->model_product=$this->model('ProductModel');
        }

        public function index(){
            $data=$this->model_product->getProductList();
            echo '<pre>';print_r($data);echo '</pre>';
        }
    }