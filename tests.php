<?php

require_once (__DIR__ . '/vendor/autoload.php');

use App\Manager\StateManager;
use App\Manager\AbundanceManager;
use App\Manager\FamilyManager;

$stateManager = new StateManager();
$testSelectAll = $stateManager-> selectAll();
dump($testSelectAll);

$testSelectById = $stateManager-> selectByID(1);
dump($testSelectById);

$familyManager = new FamilyManager();
$testSelectAll = $familyManager-> selectAll();
dump($testSelectAll);
