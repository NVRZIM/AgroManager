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
    public_
}