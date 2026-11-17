<?php
//namespace Equipments;
$dirName = __DIR__;
$physical = $dirName . "/../Physical.php";

if(file_exists($physical)) {
    require_once($physical);
    echo "\nФайл |{$physical}| подключен!\n";
} else {
    echo "Ошибка в формировании адреса";
}

$dirName = __DIR__;
$powered = $dirName . "/../Contracts/PoweredInteface.php";

if(file_exists($powered)) {
    require_once($powered);
    echo "\nФайл |{$powered}| подключен!\n";
} else {
    echo "Ошибка в формировании адреса";
}

abstract class Equipment extends Physical implements PoweredInteface
{
    public protected(set) float $fuelLevel = 0.0{
        set(float $value){
            $this -> fuelLevel = $value;
        }
    }

    public function getPercentage():float{
        return $this->fuelLevel;
    }
    public function refuel(float $units): void{
        if($units <= 0.0){
            throw new \InvalidArgumentException("Значение может быть только положительным");
        }
    }
    //переопределение сигнатуры по правилу ковариатности
    #[\Override]
    public function service(): Equipment{
        parent::service();
        return $this;
    }
}