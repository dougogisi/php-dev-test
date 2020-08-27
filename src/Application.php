<?php

namespace Src;

use Src\AppValidators\UserInputValidator;

class Application
{
    public static function run(): int {
        // read user input
        $a = readline('Enter github name: ');

        // initialise validator
        $userInputValidator = new UserInputValidator();
        $isValid = $userInputValidator->validate($a);
        if ($isValid) {
            echo 'invalid githubname' . PHP_EOL;
            return 0;
        }

        echo $a;
        return 0;
    }
}
