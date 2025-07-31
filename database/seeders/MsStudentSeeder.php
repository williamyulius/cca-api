<?php

namespace Database\Seeders;

use App\Models\MsStudent;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MsStudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        $faker = \Faker\Factory::create('id_ID');
        $characters = 'ABCDEF';
        for($i=1;$i<20;$i++){
            $randomNumbers = mt_rand(1,6);
            $randomLetter = $characters[mt_rand(0,strlen($characters) - 1)];
            $studentClass = $randomNumbers.$randomLetter;
            MsStudent::create([
                'student_id'=>sprintf('%06d',$i),
                'name'=>$faker->name,
                'unit'=>'SD',
                'class'=>$studentClass,
                'gender'=>$faker->randomElement(['L','P']),
                'religion'=>'Katolik',
            ]);
        }
    }
}
