<?php
    class App{

        private $__controller,$__action,$__params,$__routes;

        function __construct() {
            global $routes;


            // khoi tao routes
            $this->__routes=new Route();

            if(!empty($routes['default_controller'])){
                $this->__controller =$routes['default_controller'];
            }
            if(!empty($routes['default_action'])){
                $this->__action =$routes['default_action'];
            }
            $this->__params =[];

            $this->handleUrl();
        }

        function getUrl(){
            if(!empty($_SERVER['PATH_INFO'])){
                $url=$_SERVER['PATH_INFO'];
            }else{
                $url='/';
            }
            return $url;
        }

        public function handleUrl(){

            $url=$this->getUrl();
            $url=$this->__routes->handleRoute($url);
            
            $urlArr=array_filter(explode('/',$url));
            $urlArr=array_values($urlArr);


            // trường hợp dưới controller là folder chứ không phải file chứa class luôn
            $urlCheck='';
            if(!empty($urlArr)){
                foreach($urlArr as $key=>$item){
                    $urlCheck .=$item.'/';
                    $filterCheck=rtrim($urlCheck,'/');
    
                    $fileArr=explode('/',$filterCheck);
                    // viết hoa ký tự đầu phần tử cuối
                    $fileArr[count($fileArr)-1]=ucfirst($fileArr[count($fileArr)-1]);
                    $filterCheck=implode("/",$fileArr);
                    
                    // mỗi lần lặp mà không thấy file thì cắt đi 1 phần tử forder đằng trước trừ thằng đứng ở key = 0
                    if(!empty($urlArr[$key-1])){
                        unset($urlArr[$key-1]);
                    }
    
                    if(file_exists('app/controllers/'.$filterCheck.'.php')){
                        $urlCheck=$filterCheck;
                        break;
                    }
                    
                }
                $urlArr=array_values($urlArr);
            }else{

            }
        

            // xử lý controller
            if(!empty($urlArr[0])){
                $this->__controller=$urlArr[0];
                unset($urlArr[0]);
            }else{
                $this->__controller=ucfirst($this->__controller);
            }

            if(file_exists('app/controllers/'.$urlCheck.'.php')){
                require_once 'controllers/'.$urlCheck.'.php';

                // kiểm tra class tồn tại
                if(class_exists($this->__controller)){
                    $this->__controller =new $this->__controller();
                }else{
                    $this->loadError();
                }

                // xử lý action
                if(!empty($urlArr[1])){
                    $this->__action =$urlArr[1];
                    unset($urlArr[1]);
                }

                // xử lý param
                $this->__params=array_values($urlArr);
                
                // kiểm tra hàm tồn tại mới thưc hiện 
                if(method_exists($this->__controller,$this->__action)){
                    call_user_func_array([$this->__controller,$this->__action],$this->__params);
                }else{
                    $this->loadError();
                }
            }else{
                $this->loadError();
            }   
        }

        public function loadError($name='404'){
            require_once 'error/'.$name.'.php';
        }
    }