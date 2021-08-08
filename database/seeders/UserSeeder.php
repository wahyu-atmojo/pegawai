<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Role;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = new User();
		$admin->name = 'Admin';
		$admin->email = 'admin@gmail.com';
		$admin->password = bcrypt('admin123');
		$admin->save();

        $role = new Role;
        $role->roles = 'admin';
        $role->user_id = $admin->id;
        $role->save();

        $hrd = new User();
		$hrd->name = 'HRD';
		$hrd->email = 'hrd@gmail.com';
		$hrd->password = bcrypt('12345678');
		$hrd->save();

        $role = new Role;
        $role->roles = 'hrd';
        $role->user_id = $hrd->id;
        $role->save();

        $manajer = new User();
		$manajer->name = 'Manajer';
		$manajer->email = 'manajer@gmail.com';
		$manajer->password = bcrypt('12345678');
		$manajer->save();

        $role = new Role;
        $role->roles = 'manajer';
        $role->user_id = $manajer->id;
        $role->save();
    }
}
