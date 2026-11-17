<?php

$dirName = __DIR__;
$biological = $dirName . "/../Biologacal.php";

if(file_exists($biological)){
    require_once($biological);
} else {
    die("ОШИБКА: Файл Biologacal.php НЕ НАЙДЕН\n");
}

$dirName = __DIR__;
$feedable = $dirName . "/../../Contracs/FeedablenInterface.php";

if(file_exists($feedable)){
    require_once($feedable);
} else {
    die("ОШИБКА: Файл FeedablenInterface.php НЕ НАЙДЕН\n");
}

final class Cow extends Biological implements FeedableInterface
{
    public const float WEIGHT_GAIN_COEFFICIENT = 0.1;
    
    public private(set) float $weightKg {
        set(float $value) {
            if ($value < 0.0) {
                throw new \InvalidArgumentException("Вес - это положительная величина");
            }
            $this->weightKg = $value;
        }
    }
    
    public bool $isHealthy {
        get => $this->health > 50.0;
    }
    
    public function __construct(string $id, string $name, float $initialWeight) {
        parent::__construct($id, $name);
        $this->weightKg = $initialWeight;
    }
    
    public function feed(float $kg): void
    {
        if ($kg <= 0.0) {
            throw new \InvalidArgumentException(message: "Недостаточно корма");
        }
        
        $this->weightKg += ($kg * self::WEIGHT_GAIN_COEFFICIENT);
        $this->changeHealth(2.0);
    }
    
    #[\Override]
    public function handleDeath(): void
    {
        $this->weightKg = 0.0;
        echo "Животное с ID:{$this->id} отправлено на колбасу\n";
    }
}