<?php

class ApplicationCest
{
    public function _before(UnitTester $I)
    {
    }

    public function shouldReturnZeroExitCodeByDefault(UnitTester $I)
    {
        $I->assertEquals(0, \Src\Application::run());
    }
}
