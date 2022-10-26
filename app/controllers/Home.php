<?php
    class Home{
        public function index(){
            echo 'trang chủ';
        }

        public function detail($id='',$slug=''){
            echo 'id:'.$id.'</br>';
            echo 'slug:'.$slug;
        }

        public function search(){
            $keyword=$_GET['keyword'];
            echo 'tu khoa:'.$keyword;
        }
    }