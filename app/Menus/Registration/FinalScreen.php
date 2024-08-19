<?php

namespace App\Menus\Registration;

use App\Menus\Menu;
use Rejoice\Database\DB;

class FinalScreen extends Menu
{
    public function before()
    {
        $student_count = DB::table('students')->count();
        $index_no = "GCTU04090" . $student_count + 1;

        DB::table('students')->insert([
            'email' => $this->previousResponses('Registration::EnterEmail'),
            'msisdn' => $this->tel(),
            'full_name' => $this->previousResponses('Registration::FullName'),
            'index_no' => $index_no,
            'created_at' => date('Y-m-d H:i:s'),
            'updated_at' => date('Y-m-d H:i:s')
        ]);
    }

    public function message()
    {
        return 'Registration successful. You will be notified within the next 24 hours of registration period via sms for next steps.';
    }

    private function generateIndexNumber() {}
}

#GCTU040901