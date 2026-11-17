<?php

$dirName = __DIR__;
$entity = dirname($dirName) . "/Entity.php";

if(file_exists($entity)){
    require_once($entity);
} else {
    die("ОШИБКА: Файл Entity.php НЕ НАЙДЕН\n");
}

abstract class Biological extends Entity
{
    public float $health = 100.0;

    public function getHealth(): float
    {
        return $this->health;
    }

    public function changeHealth(float $delta): void  
    {
        $this->health += $delta;
        
        // Ограничиваем здоровье от 0 до 100
        $this->health = min(100.0, max(0.0, $this->health));
        
        if($this->health === 0.0)
        {
            echo "Объект с ID:{$this->id} умер.\n";
            $this->handleDeath();
        }
    }

    abstract public function handleDeath(): void;
}