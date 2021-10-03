<?php 
// Задание выполнено! регистр сохраняется за позицией, знаки препинания остаются на месте!
require_once (/Class/ReversStrops.php);
$str = 'Привет! Давно не виделись.';
$stropsrevers = new ReversStrops($str);
$strops = $stropsrevers ->getStrops();
echo $strops;
echo '<br>';
$str = 'Вот, другие знаки! И знак вну!три сло№ва.';
$stropsrevers = new ReversStrops($str);
$strops = $stropsrevers ->getStrops();
echo $strops;
