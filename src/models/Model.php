<?php


class Model{
        protected static $tableName = '';
        protected static $columns = ''; //colunas relacionadas ao model
        protected $values = [];

        function __construct($arr){

            $this->loadFromArray($arr);
            // echo 'ok<br>';

        }
        public function loadFromArray($arr){

            if($arr){

                foreach($arr as $key => $value){

                        $this->$key = $value;
                        
                }

            }

        }

        public function __get($key) {
            return $this->values[$key];
        }
    
        public function __set($key, $value) {
            $this->values[$key] = $value;
        }
        public static function getOne($filters = []){
            
            $class = get_called_class();
            $result = static::getResultSetFromSelect($filters, $columns = '*');
            return $result ? new $class($result->fetch_assoc()) : null;

        }
        public static function get($filters = []){
            $objects = [];
            $result = static::getResultSetFromSelect($filters, $columns = '*');
            if($result){
                $class = get_called_class();
                    while($row = $result->fetch_assoc()){
                        array_push($objects, new $class($row));
                    }
                }
                return $objects;
        }

        public static function getResultSetFromSelect($filters = [], $columns){

                $sql = 'SELECT ' . $columns . ' FROM ' . static::$tableName . static::getFilters($filters);
                $result = DataBase::getResultFromQuery($sql);
                if($result->num_rows === 0){
                    return null;
                }else{
                    return $result;
                }

        }

         private static function getFilters($filters){
             $sql = '';
             if(count($filters) > 0){
                 $sql .= " WHERE 1 = 1";
                 foreach($filters as $column => $value){

                 $sql .= " AND ${column} = " . static::getFromatedValue($value);

                 }
             }
             return $sql;
         }

         private static function getFromatedValue($value) { ///formata valor ex valor vazio para null para a bd aceitar

                if(is_null($value)){
                    return "null";
                }elseif(gettype($value) == 'string') {

                    return "'${value}'";

                }else{

                    return $value;

                }

                


         }






        }


        