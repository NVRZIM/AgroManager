<?php

$dir = __DIR__;

echo "Подключаем Entity...\n";
require_once $dir . '/Entity.php';

echo "Подключаем Biological...\n";
require_once $dir . '/Biologacal/Biologacal.php';

echo "Подключаем Cow...\n";
require_once $dir . '/Biologacal/Animals/Cow.php';

echo "\nВсе файлы успешно подключены!\n\n";

$cow = new Cow(id: "2", name: "Буренка", initialWeight: 450.5);
print_r($cow);

echo "\n--- Проверка изменения здоровья ---\n";

// Создаем новую корову для теста
$cowTest = new Cow(id: "3", name: "Зорька", initialWeight: 400.0);
echo "Начальное здоровье: " . $cowTest->getHealth() . "\n"; 

// Передаем большое отрицательное значение
$cowTest->changeHealth(-150.0); 

echo "Здоровье после вызова changeHealth(-150.0): " . $cowTest->getHealth() . "\n";