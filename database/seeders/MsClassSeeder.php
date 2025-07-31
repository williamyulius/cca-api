<?php

namespace Database\Seeders;

use App\Models\MsClass;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MsClassSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        for($i=1;$i<=6;$i++){
            MsClass::create([
                'code'=>$i.'A',
                'name'=>'Kelas'.$i.'A',
                'group'=>$i,
            ]);
            MsClass::create([
                'code'=>$i.'B',
                'name'=>'Kelas'.$i.'B',
                'group'=>$i,
            ]);
            MsClass::create([
                'code'=>$i.'C',
                'name'=>'Kelas'.$i.'C',
                'group'=>$i,
            ]);
            MsClass::create([
                'code'=>$i.'D',
                'name'=>'Kelas'.$i.'D',
                'group'=>$i,
            ]);
            MsClass::create([
                'code'=>$i.'E',
                'name'=>'Kelas'.$i.'E',
                'group'=>$i,
            ]);
            MsClass::create([
                'code'=>$i.'F',
                'name'=>'Kelas'.$i.'F',
                'group'=>$i,
            ]);
        }
        
        
    }
}
