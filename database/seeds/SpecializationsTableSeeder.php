<?php

use App\Models\Specialization;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SpecializationsTableSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {

        DB::table('specializations')->delete();
        $specializations = [
            ['en'=> 'Arabic', 'ar'=> 'عربي'],
            ['en'=> 'Sciences', 'ar'=> 'علوم'],
            ['en'=> 'Computer', 'ar'=> 'حاسب الي'],
            ['en'=> 'English', 'ar'=> 'انجليزي'],
            ['en'=> 'Biology', 'ar'=> 'أحياء'],
            ['en'=> 'Mathematics', 'ar'=> 'رياضيات'],
            ['en'=> 'Public Health', 'ar'=> 'صحة عامة'],
            ['en'=> 'no profession', 'ar'=> 'لا يوجد'],
            ['en'=> 'no profession', 'ar'=> 'ثاريخ'],
            ['en'=> 'General culture', 'ar'=> 'ثقافة عامة'],
            ['en'=> 'Islamic Education', 'ar'=> 'تربية اسلامية'],


        ];
        foreach ($specializations as $S) {
            Specialization::create(['name' => $S]);
        }

    }

}