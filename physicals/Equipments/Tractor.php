<?php

$dir = __DIR__;
$equipment = $dir . '/Equipment.php';
$Biological = $dir . '/Biologicals/Biological.php';

if (file_exists($equipment)) {
    require_once $equipment;
    echo "Файл '" . $equipment . "' подключен";
}

final class Tractor extends Equipment
{
    public function attachTo(Physical $physical): Physical
    {
        // TODO: Implement attachTo() method.
    }
}