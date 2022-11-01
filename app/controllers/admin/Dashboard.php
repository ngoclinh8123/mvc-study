<?php
    class Dashboard extends Controller{
        public function index(){
            echo 'trang dashboard';
        }

        public function detail($id){
            echo 'chi tiet :'.$id;
        }
    }