<?php

use Illuminate\Database\Seeder;
use App\User;
class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $data = ['name'=>'roisul', 'email'=>'roisnewversion@gmail.com', 'password'=>bcrypt('roisul')];

        User::create($data);
    }
}
