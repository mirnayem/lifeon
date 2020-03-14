<?php

use App\Role;
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
        $role1 = new Role();
        $role1->name = 'admin';
        $role1->save();

        $role2 = new Role();
        $role2->name = 'author';
        $role2->save();

        $role3 = new Role();
        $role3->name = 'subscriber';
        $role3->save();
    }
}
