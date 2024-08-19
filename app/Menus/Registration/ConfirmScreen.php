<?php

namespace App\Menus\Registration;

use App\Menus\Menu;

class ConfirmScreen extends Menu
{
    public function message()
    {
        $fullName = $this->previousResponses('Registration::FullName');
        $email = $this->previousResponses('Registration::EnterEmail');
        $contact = $this->tel();

        return ["Please Verify and Confirm Your Details\n\n"
            . "Name: $fullName\n"
            . "Email: $email\n"
            . "Contact: $contact\n"];
    }

    public function actions()
    {
        $actions =  [
            '1' => [
                'display' => 'Continue',
                'next_menu' => 'Registration::FinalScreen'
            ]
        ];

        return $this->withBack($actions);
    }
}
