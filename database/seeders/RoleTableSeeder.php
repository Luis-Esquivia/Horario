<?php

namespace Database\Seeders;

use App\Models\Role;
use Illuminate\Database\Seeder;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role();
        $role->name = 'admin';
        $role->description = 'Administrator';
        $role->save();

        $role = new Role();
        $role->name = 'coordinador';
        $role->description = 'coordinador';
        $role->save();

        $role = new Role();
        $role->name = 'instructor';
        $role->description = 'instructor';
        $role->save();

        // $role = new Role();
        // $role->name = 'aprendiz';
        // $role->description = 'aprendiz';
        // $role->save();
    }
}
