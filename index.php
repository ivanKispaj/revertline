<?php 
require_once (/Class/ReversStrops.php);
$str = 'При!вет! Давно не виде.лись.';
$stropsrevers = new ReversStrops;
$stropsrevers ->getStrops($str);
echo $stropsrevers;
