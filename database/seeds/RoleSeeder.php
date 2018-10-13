<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RoleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $role = new Role;

        $role->name = "Admin";
        $role->slug = str_slug("Admin");
        $role->save();
    }
}
