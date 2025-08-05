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
        // $characters = 'ABCDEF';
        $idCounter = 1;
        for($i=1;$i<=6;$i++){
            for($ctr=1;$ctr<=3;$ctr++){
                MsStudent::create([
                    'student_id'=>sprintf('%06d',$idCounter),
                    'name'=>$faker->name,
                    'unit'=>'SD',
                    'class'=>($i).'A',
                    'gender'=>$faker->randomElement(['L','P']),
                    'religion'=>'Katolik',
                ]);
                $idCounter++;
            }
            for($ctr=1;$ctr<=3;$ctr++){
                MsStudent::create([
                    'student_id'=>sprintf('%06d',$idCounter),
                    'name'=>$faker->name,
                    'unit'=>'SD',
                    'class'=>($i).'B',
                    'gender'=>$faker->randomElement(['L','P']),
                    'religion'=>'Katolik',
                ]);
                $idCounter++;
            }
            for($ctr=1;$ctr<=3;$ctr++){
                MsStudent::create([
                    'student_id'=>sprintf('%06d',$idCounter),
                    'name'=>$faker->name,
                    'unit'=>'SD',
                    'class'=>($i).'C',
                    'gender'=>$faker->randomElement(['L','P']),
                    'religion'=>'Katolik',
                ]);
                $idCounter++;
            }
            for($ctr=1;$ctr<=3;$ctr++){
                MsStudent::create([
                    'student_id'=>sprintf('%06d',$idCounter),
                    'name'=>$faker->name,
                    'unit'=>'SD',
                    'class'=>($i).'D',
                    'gender'=>$faker->randomElement(['L','P']),
                    'religion'=>'Katolik',
                ]);
                $idCounter++;
            }
            for($ctr=1;$ctr<=3;$ctr++){
                MsStudent::create([
                    'student_id'=>sprintf('%06d',$idCounter),
                    'name'=>$faker->name,
                    'unit'=>'SD',
                    'class'=>($i).'E',
                    'gender'=>$faker->randomElement(['L','P']),
                    'religion'=>'Katolik',
                ]);
                $idCounter++;
            }
            for($ctr=1;$ctr<=3;$ctr++){
                MsStudent::create([
                    'student_id'=>sprintf('%06d',$idCounter),
                    'name'=>$faker->name,
                    'unit'=>'SD',
                    'class'=>($i).'F',
                    'gender'=>$faker->randomElement(['L','P']),
                    'religion'=>'Katolik',
                ]);
                $idCounter++;
            }
        }

        // for($i=1;$i<20;$i++){
        //     if($i>=1){
        //         MsStudent::create([
        //             'student_id'=>sprintf('%06d',$i),
        //             'name'=>$faker->name,
        //             'unit'=>'SD',
        //             'class'=>($i%7).'A',
        //             'gender'=>$faker->randomElement(['L','P']),
        //             'religion'=>'Katolik',
        //         ]);
        //     } elseif($i>3){
        //         MsStudent::create([
        //             'student_id'=>sprintf('%06d',$i),
        //             'name'=>$faker->name,
        //             'unit'=>'SD',
        //             'class'=>($i%7).'B',
        //             'gender'=>$faker->randomElement(['L','P']),
        //             'religion'=>'Katolik',
        //         ]);
        //     } elseif($i>7){
        //         MsStudent::create([
        //             'student_id'=>sprintf('%06d',$i),
        //             'name'=>$faker->name,
        //             'unit'=>'SD',
        //             'class'=>($i%7).'C',
        //             'gender'=>$faker->randomElement(['L','P']),
        //             'religion'=>'Katolik',
        //         ]);
        //     } elseif($i>10){
        //         MsStudent::create([
        //             'student_id'=>sprintf('%06d',$i),
        //             'name'=>$faker->name,
        //             'unit'=>'SD',
        //             'class'=>($i%7).'D',
        //             'gender'=>$faker->randomElement(['L','P']),
        //             'religion'=>'Katolik',
        //         ]);
        //     } elseif($i>14){
        //         MsStudent::create([
        //             'student_id'=>sprintf('%06d',$i),
        //             'name'=>$faker->name,
        //             'unit'=>'SD',
        //             'class'=>($i%7).'E',
        //             'gender'=>$faker->randomElement(['L','P']),
        //             'religion'=>'Katolik',
        //         ]);
        //     } elseif($i>17){
        //         MsStudent::create([
        //             'student_id'=>sprintf('%06d',$i),
        //             'name'=>$faker->name,
        //             'unit'=>'SD',
        //             'class'=>($i%7).'F',
        //             'gender'=>$faker->randomElement(['L','P']),
        //             'religion'=>'Katolik',
        //         ]);
        //     }
        //     // $randomNumbers = mt_rand(1,6);
        //     // $randomLetter = $characters[mt_rand(0,strlen($characters) - 1)];
        //     // $studentClass = $randomNumbers.$randomLetter;
        //     // MsStudent::create([
        //     //     'student_id'=>sprintf('%06d',$i),
        //     //     'name'=>$faker->name,
        //     //     'unit'=>'SD',
        //     //     'class'=>$i%7.,
        //     //     'gender'=>$faker->randomElement(['L','P']),
        //     //     'religion'=>'Katolik',
        //     // ]);
        // }

        // MsStudent::create([
        //     'student_id'=>sprintf('%06d',$i),
        //     'name'=>$faker->name,
        //     'unit'=>'SD',
        //     'class'=>$studentClass,
        //     'gender'=>$faker->randomElement(['L','P']),
        //     'religion'=>'Katolik',
        // ]);
        // MsStudent::create([
        //     'student_id'=>sprintf('%06d',$i),
        //     'name'=>$faker->name,
        //     'unit'=>'SD',
        //     'class'=>$studentClass,
        //     'gender'=>$faker->randomElement(['L','P']),
        //     'religion'=>'Katolik',
        // ]);
        // MsStudent::create([
        //     'student_id'=>sprintf('%06d',$i),
        //     'name'=>$faker->name,
        //     'unit'=>'SD',
        //     'class'=>$studentClass,
        //     'gender'=>$faker->randomElement(['L','P']),
        //     'religion'=>'Katolik',
        // ]);
        // MsStudent::create([
        //     'student_id'=>sprintf('%06d',$i),
        //     'name'=>$faker->name,
        //     'unit'=>'SD',
        //     'class'=>$studentClass,
        //     'gender'=>$faker->randomElement(['L','P']),
        //     'religion'=>'Katolik',
        // ]);
    }
}
