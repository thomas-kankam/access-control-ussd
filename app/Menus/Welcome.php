<?php

namespace App\Menus;

class Welcome extends Menu
{
    protected $check_number;
    public function before()
    {
        $this->check_number = $this->check_msisdn($this->tel());
    }
    public function message()
    {
        if (!$this->check_msisdn($this->tel())) {
            return "Welcome to the Student Registration";
        }

        return "Welcome, " . $this->get_index_number($this->tel())->full_name;
    }


    public function actions()
    {
        if (!$this->check_msisdn($this->tel())) {
            return [
                '1' => [
                    'display' => 'Continue',
                    'next_menu' => 'Registration::FullName'
                ],
                '2' => [
                    'display' => 'Cancel',
                    'next_menu' => '__end'
                ]
            ];
        }

        return [
            '1' => [
                'display' => 'Check index number',
                'next_menu' => 'Settings::CheckIndexNumber',
            ],
            '0' => [
                'display' => 'Cancel',
                'next_menu' => '__end'
            ]
        ];
    }

    public function after()
    {
        $this->sessionSave("welcome_option", $this->userSavedResponse());
    }
}
