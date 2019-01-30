  <?php

  use App\User;
  use Illuminate\Database\Seeder;

  class UsersTableSeeder extends Seeder
  {
      /**
       * Run the database seeds.
       *
       * @return void
       */
      public function run()
      {
        $root = User::create([
           'name' => 'Admin',
           'username' => 'admin',
           'password' => bcrypt('admin123'),
         ]);

       $pre_admin = User::create([
          'name' => 'Precamp Admin',
          'username' => 'preadmin',
          'password' => bcrypt('preadmin'),
        ]);

      $pre_user = User::create([
         'name' => 'Precamp User',
         'username' => 'preuser',
         'password' => bcrypt('preuser'),
       ]);

       $camp_admin = User::create([
          'name' => 'Camp Admin',
          'username' => 'campadmin',
          'password' => bcrypt('campadmin'),
        ]);

      $medical = User::create([
         'name' => 'Medical',
         'username' => 'medical',
         'password' => bcrypt('medical'),
       ]);

     $reception = User::create([
        'name' => 'Reception',
        'username' => 'reception',
        'password' => bcrypt('reception'),
      ]);

      $genetic = User::create([
         'name' => 'Genetic',
         'username' => 'genetic',
         'password' => bcrypt('genetic'),
       ]);

     $blooddraw = User::create([
        'name' => 'Blood Draw',
        'username' => 'blooddraw',
        'password' => bcrypt('blooddraw'),
      ]);

      $hobbies = User::create([
         'name' => 'Hobbies',
         'username' => 'hobbies',
         'password' => bcrypt('hobbies'),
       ]);

     $physio = User::create([
        'name' => 'Physiotherapy',
        'username' => 'physio',
        'password' => bcrypt('physio'),
      ]);

    $settledta = User::create([
       'name' => 'Settled TA',
       'username' => 'settledta',
       'password' => bcrypt('settledta'),
     ]);

      $root->assignRole('root');
      $pre_admin->assignRole('pre_admin');
      $pre_user->assignRole('pre_user');
      $camp_admin->assignRole('camp_admin');
      $medical->assignRole('user');
      $reception->assignRole('user');
      $genetic->assignRole('user');
      $blooddraw->assignRole('user');
      $hobbies->assignRole('user');
      $physio->assignRole('user');
      $settledta->assignRole('user');
      }
  }
