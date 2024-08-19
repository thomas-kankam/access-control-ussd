<?php

namespace App\Menus;

use Rejoice\Menu\BaseMenu;
use App\Helpers\CurlUtils;
use Rejoice\Database\DB;

/**
 * This is the default Menu class which the other menus extend.
 */
class Menu extends BaseMenu
{
    public function check_msisdn($msisdn)
    {
        $client = DB::table('students')->where('msisdn', '=', $msisdn)->exists();

        if ($client) {
            return true;
        }

        return false;
    }

    public function get_index_number($msisdn)
    {
        $client = DB::table('students')->where('msisdn', '=', $msisdn)->first();

        if ($client) {
            return $client;
        }

        return null;
    }



    public function get_network()
    {
        $network = "";
        if ($this->network() == 01) {
            $network = "MTN";
        }
        if ($this->network() == 02) {
            $network = "VDF";
        }
        if ($this->network() == 03) {
            $network = "TGO";
        }
        if ($this->network() == 07) {
            $network = "GLO";
        }
        return $network;
    }
}
