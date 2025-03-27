<?php

require_once (__DIR__ . '/vendor/autoload.php');
require_once (__DIR__ . '/templates/users/user_profil.php');


use App\Manager\StateManager;
use App\Manager\AbundanceManager;
use App\Manager\FamilyManager;
use App\Manager\ElementManager;

$stateManager = new StateManager();
$testSelectAll = $stateManager-> selectAll();
dump($testSelectAll);

$testSelectById = $stateManager-> selectById(1);
dump($testSelectById);

$familyManager = new FamilyManager();
$testSelectAll = $familyManager-> selectAll();
dump($testSelectAll);

$testSelectById = $familyManager-> selectById(1);
dump($testSelectById);

$abundanceManager = new AbundanceManager();
$testSelectAll = $abundanceManager-> selectAll();
dump($testSelectAll);

$testSelectById = $abundanceManager-> selectById(1);
dump($testSelectById);

$elementManager = new ElementManager();
$testSelectAll = $elementManager-> selectAll();
dump($testSelectAll);


$testSelectById = $elementManager-> selectById(102);
dump($testSelectById);





