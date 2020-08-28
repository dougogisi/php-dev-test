<?php

namespace Src\AppValidators;

class UserInputValidator implements ValidatorInterface
{
    /**
     * @param string $name
     * @return bool
     */
    public function validate(string $name) : bool
    {
        return preg_match('/[^a-zA-Z\d]/', $name) ? false : true;
    }
}
