<?php
    class Route{

        public function handleRoute($url){
            global $routes;
            unset($routes['default_controller']);
            unset($routes['default_action']);
            // echo '<pre>';print_r($routes);echo '</pre>';

            // trường hợp vào web mà không có route thì route mặc định là '/'
            if($url!="/"){
                $url=trim($url,'/');
            }else{
                $url='trang-chu';
            }
            // echo $url;

            $handleUrl=$url;
            if(!empty($routes)){
                foreach($routes as $key=>$value){
                    if(preg_match('#'.$key.'#is',$url)){
                        $handleUrl=preg_replace('#'.$key.'#is',$value,$url);
                    }
                }
            }
            
            return $handleUrl;
        }
    }