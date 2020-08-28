<?php

namespace Src;

use Src\AppValidators\UserInputValidator;
use Src\AppErrors\InvalidGithubClientSettings;
use Src\Lib\Clients\GithubUserClient;
use Src\Lib\Analysers\LanguageAnalyser;

class Application
{
    public static function run(): int {
        // read user input
        $username = readline('Enter github name: ');

        // initialise validator
        $userInputValidator = new UserInputValidator();
        $isValid = $userInputValidator->validate($username);
        if (!$isValid) {
            echo 'invalid githubname' . PHP_EOL;
            return 0;
        }

        try {
            $githubUserClient = new GithubUserClient(['username' => $username]);
            $response = $githubUserClient->fetch();
            $analyser = new LanguageAnalyser($response);
            $result = $analyser->analyse();
            var_dump($result->getResult());
        } catch(InvalidGithubClientSettings $e) {
            echo 'curl error' . PHP_EOL;
            echo $e->getMessage() . PHP_EOL;
            return 0;
        }

        return 0;
    }
}
