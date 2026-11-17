<?php

$dir = __DIR__;
$entity = $dir . '/Entity.php';
// Используем ваши реальные названия (с опечаткой "a")
$Biological = $dir . '/Biologacal/Biologacal.php'; 

if (file_exists($entity)) {
    require_once $entity;
    echo "Файл '" . $entity . "' подключен\n";
} else {
    echo "Файл Entity НЕ НАЙДЕН!\n";
}

if (file_exists($Biological)) {
    require_once $Biological;
    echo "Файл '" . $Biological . "' подключен\n";
} else {
    echo "Файл Biological НЕ НАЙДЕН!\n";
}

echo "\n"; 

// Имя класса внутри файла тоже может быть с опечаткой! 
// Если внутри Biologacal.php написано class Biologacal { ... }
// то и здесь нужно писать: new Biologacal(...)
$biological = new Biological(id: "1", name: "First Ivan");
print_r($biological);