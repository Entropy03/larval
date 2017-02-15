<?php

use App\User;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->firstname = "zhang123";
        $user->phone = "18610166370";
        $user->email = "test@test.com";
        $user->password = bcrypt("admin");
        $user->save();

    }

}
