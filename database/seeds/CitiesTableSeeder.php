<?php

use App\City;
use Illuminate\Database\Seeder;

class CitiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

      City::create([
         'district_id' => '1',
         'city' => 'Abiramam',
       ]);

     City::create([
        'district_id' => '1',
        'city' => 'Achampudur',
      ]);

    City::create([
       'district_id' => '1',
       'city' => 'Acharapakkam',
     ]);

     City::create([
        'district_id' => '1',
        'city' => 'Achipatti',
      ]);

    City::create([
       'district_id' => '1',
       'city' => 'Adaikkakuzhi',
     ]);

   City::create([
      'district_id' => '1',
      'city' => 'Adikaratti',
    ]);

   City::create([
      'district_id' => '1',
      'city' => 'Adiyanuthu',
    ]);
//coimbathur
    City::create([
       'district_id' => '2',
       'city' => 'Balakrishnampatti',
     ]);

   City::create([
      'district_id' => '2',
      'city' => 'Balakrishnapuram',
    ]);

  City::create([
     'district_id' => '2',
     'city' => 'Balasamudram',
   ]);

   City::create([
      'district_id' => '2',
      'city' => 'Bargur',
    ]);

  City::create([
     'district_id' => '2',
     'city' => 'Batlagundu',
   ]);

 City::create([
    'district_id' => '2',
    'city' => 'Belur',
  ]);

 City::create([
    'district_id' => '2',
    'city' => 'Bhavani',
  ]);

    }
}
