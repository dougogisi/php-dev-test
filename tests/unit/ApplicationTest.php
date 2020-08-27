<?php

use Src\Application;

class ApplicationTest
{
    public function _before(UnitTester $I)
    {
    }

    public function shouldReturnZeroExitCodeByDefault(UnitTester $I)
    {
        $I->assertEquals(0, Application::run());
    }
}
