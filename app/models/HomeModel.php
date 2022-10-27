<?php
    class HomeModel{
        protected $_table='products';

        public function getList(){
            $data=[
                'Item1'=>'acb',
                'item2'
            ];
            return $data;
        }

        public function getDetail($id){
            $data=[
                'item1'=>'acb',
                'tiem2',
                'tei3'
            ];
            return $data[$id];
        }
    }