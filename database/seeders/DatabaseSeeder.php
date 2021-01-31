<?php

namespace Database\Seeders;

use App\Models\Division;
use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $faker = \Faker\Factory::create('ja_JP');

        $sdivisions = [
            "総務部", // 1
            "人事部", // 2
            "経理部", // 3
            "営業部", // 4
            "開発部", // 5
            "事業部", // 6
            "製造部", // 7
        ];

        foreach ($sdivisions as $sivision) {
            Division::create(['name'=>$sivision]);
        }

        User::create([
            'img' => 'profile.png',
            'name' => $faker -> name,
            'role' => 'admin',
            'email' => 'demo@example.com',
            'division_id' => 1,
            'password' => bcrypt('pw1234'),
        ]);

        for ($i=0; $i < 9; $i++) { 
            if(($i % 5)==0 ){
                $role = 'admin';
            }else{
                $role = 'user';
            }
            User::create([
                'name' => $faker -> name,
                'email' => $faker -> safeEmail,
                'role' => $role,
                'img' => $i . '.png',
                'division_id' => $faker -> numberBetween(1,7),
                'password' => bcrypt('pw1234'),
            ]);
        }

    }
}
