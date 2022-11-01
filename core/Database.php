<?php
    class Database{
        private $__conn;
        
        public function __construct(){
            global $db_config;
            $this->__conn =Connection::getInstance($db_config);

        }

        function insert($table,$data){
            if(!empty($data)){
                $fieldStr='';
                $valueStr='';
                foreach($data as $key=>$value){
                    $fieldStr.=$key.',';
                    $valueStr.="'".$value."',";

                }
                $fieldStr=rtrim($fieldStr,',');
                $valueStr=rtrim($valueStr,',');

                $sql='insert into '.$table.'('.$fieldStr.') values ('.$valueStr.')';

                $status=$this->query($sql);
                if($status){
                    return $status;
                }
            }
            return false;
        }

        function query($sql){
            $statement=$this->__conn->prepare($sql);
            $statement->execute();
            return $statement;
        }
    }