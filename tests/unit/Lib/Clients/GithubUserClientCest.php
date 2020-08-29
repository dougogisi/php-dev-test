<?php

use Src\Lib\Clients\GithubUserClient;

class GithubUserClientCest
{
    public function _before(UnitTester $I)
    {
    }

    public function constructorShouldThrowInvalidGithubClientSettingsWithInvalidSettingsArray(UnitTester $I)
    {
        $I->expectThrowable('Src\AppErrors\InvalidGithubClientSettings', function() {
            $client = new GithubUserClient(['invalid' => 'test']);
        });
    }
}
