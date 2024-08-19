<?php

namespace App\Menus\Settings;

use App\Menus\Menu;

class CheckIndexNumber extends Menu
{
    public function message()
    {
        $index_no = $this->get_index_number($this->tel());

        return "Your index number is: \n\n" . $index_no->index_no;
    }

    public function actions()
    {
        $actions = [];

        return $this->withBack($actions);
    }
}
