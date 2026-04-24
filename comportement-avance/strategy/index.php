<?php

require_once 'StrategiePromo.php';
require_once 'CalculateurPrix.php';

$calc = new CalculateurPrix(new StrategiePromo());
echo $calc->calculer(100);
