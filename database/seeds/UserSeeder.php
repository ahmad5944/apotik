<?php
use App\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin=User::create([
            'name'=> 'admin',
            'email'=>'admin@test.com',
            'password'=>bcrypt('password')
            ]);
            $admin->assignRole('admin');
            $user=User::create([
            'name'=> 'user',
            'email'=>'user@test.com',
            'password'=>bcrypt('password')
            ]);
            $admin->assignRole('user');
    }
}
