<?php

use App\District;
use Illuminate\Database\Seeder;

class DistrictTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      District::create([
         'district' => 'Chennai',
         'state' => 'TamilNadu',
       ]);

      District::create([
         'district' => 'Coimbatore',
         'state' => 'TamilNadu',
       ]);

      District::create([
         'district' => 'Trichy',
         'state' => 'TamilNadu',
       ]);

      District::create([
         'district' => 'Dindugal',
         'state' => 'TamilNadu',
       ]);

      District::create([
         'district' => 'Madurai',
         'state' => 'TamilNadu',
       ]);

      District::create([
         'district' => 'Villupuram',
         'state' => 'TamilNadu',
       ]);

      District::create([
         'district' => 'Dharmapuri',
         'state' => 'TamilNadu',
       ]);

      District::create([
         'district' => 'Thanjavur',
         'state' => 'TamilNadu',
       ]);

      District::create([
         'district' => 'Pudukkottai',
         'state' => 'TamilNadu',
       ]);

    }
}
