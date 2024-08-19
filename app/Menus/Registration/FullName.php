<?php

namespace App\Menus\Registration;

use Prinx\Str;
use App\Menus\Menu;

class FullName extends Menu
{
    public function message()
    {
        return "Enter Your Full Name";
    }

    public function actions()
    {
        $actions = [];

        return $this->withBack($actions);
    }
    public function defaultNextMenu()
    {
        return 'Registration::EnterEmail';
    }

    public function validate()
    {
        return 'alphabetic';
    }

    public function saveAs($response)
    {
        return Str::capitalise($response);
    }
}
