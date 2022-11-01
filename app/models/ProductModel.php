<?php
    class ProductModel{
        public function getProductList(){
            $data=[
                'item1',
                'item2'
            ];
            return $data;
        }

        public function getDetail($id){
            $data=[
                'jordan low xam vet den',
                'jordan low den',
                'vans old school',
                'giay canvas',
                'converse 1970'
            ];
            return $data[$id];
        }
    }