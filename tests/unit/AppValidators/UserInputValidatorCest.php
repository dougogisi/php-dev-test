<?php

use Src\AppValidators\UserInputValidator;

class UserInputValidatorCest
{
    public function _before(UnitTester $I)
    {
    }

    public function validateShouldReturnFalseForNamesWithSpecialChars(UnitTester $I)
    {
        $validator = new UserInputValidator();
        $I->assertFalse($validator->validate('doug**'), "Incorrect validation");
    }
}
