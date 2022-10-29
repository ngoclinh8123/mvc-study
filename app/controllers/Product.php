<?php
    class Product extends Controller{

        public $model_product;

        public $data=[];

        public function __construct() {
            $this->model_product=$this->model('ProductModel');
        }

        public function index(){
            echo 'product';
        }

        public function getList(){
            $this->data['list_product']=$this->model_product->getProductList();
            $this->data['title_product']='day la title';
            //echo '<pre>';print_r($data);echo '</pre>';

            // reder view
            $this->render('products/list',$this->data);
        }
    }