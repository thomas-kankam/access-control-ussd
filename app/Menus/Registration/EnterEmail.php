<?php

namespace App\Menus\Registration;

use App\Menus\Menu;

class EnterEmail extends Menu
{
    public function message()
    {
        return 'Enter your email address';
    }

    public function actions()
    {
        $actions = [];

        return $this->withBack($actions);
    }
    public function defaultNextMenu()
    {
        return 'Registration::ConfirmScreen';
    }

    public function validate($response)
    {
        return filter_var($response, FILTER_VALIDATE_EMAIL) !== false;
    }
}
