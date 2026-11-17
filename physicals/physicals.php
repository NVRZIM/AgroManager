<?php

//namespace Physicals;

$dirName = __DIR__;
$entity = $dirName . "/../Entity.php";

if(file_exists($entity)) {
    require_once($entity);
    echo "\nфайл {$entity} подключен!\n";
} else {
    echo "Ошибка в формировании адреса";
}

abstract class Physical extends Entity
{
    public protected(set) float $wear = 0.0{
        set(float $value){
            if($value < 0.0 || $value > 100.0){
                throw new \OutOfRangeException(message: "Износ может принимать значения от 0 до 100");
            }
            this -> wear = $value;
        }

        public function service(): Physical{
            $this -> wear = 0.0;
            return $this;
        }
        abstract public function attachTo(Physical $physical): Physical;
    }
}