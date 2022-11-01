<?php
    class HomeModel extends Model{
        //protected $_table='test';

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

        public function get(){
            $data=$this->db->query("select * from test where id=1")->fetchAll(PDO::FETCH_ASSOC);
            return $data;
        }
    }