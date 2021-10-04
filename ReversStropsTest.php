<?php
require_once 'Class/ReversStrops.php';
use PHPUnit\Framework\TestCase;

class ReversStropsTest extends TestCase {
    public function testPower()
    {
        $my = new ReversStrops('При!вет! Давно не виде.лись.');
        $strops = $my->getStrops();
        echo $strops;
 }
}
