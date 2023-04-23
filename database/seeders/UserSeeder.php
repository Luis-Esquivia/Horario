<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
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
        $user = User::create([
            'name' => 'Administrador Sena',
            'email' => '899999034',
            'password' => bcrypt('899999034Sn*'),
        ]);
        $user->roles()->attach(Role::where('name', 'admin')->first());
    }
}
