<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Role;
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role_user = Role::where('name', 'user')->first();
        $role_admin = Role::where('name', 'admin')->first();
        
        $user = new User();
        $user->document = '12345';
        $user->name = 'User';
        $user->last_name = 'Last Name';
        $user->cv = 'cv';
        $user->photo = 'photo';
        $user->email = 'user@example.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_user);
        
        $user = new User();
        $user->document = '6789';
        $user->name = 'Admin';
        $user->last_name = 'Last Name';
        $user->cv = 'cv';
        $user->photo = 'photo';
        $user->email = 'admin@example.com';
        $user->password = bcrypt('secret');
        $user->save();
        $user->roles()->attach($role_admin);
    }
}
