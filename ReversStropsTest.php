<?php
require_once 'Class/ReversStrops.php';
use PHPUnit\Framework\TestCase;

class ReversStropsTest extends TestCase {
    public function testPower()
    {
        $my = new ReversStrops('���!���! ����� �� ����.����.');
        $my->getStrops();
 }
}