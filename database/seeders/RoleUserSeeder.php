<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class RoleUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin = User::where('email', 'admin@admin.com')->first();
        $user = User::where('email', 'user@user.com')->first();

        $admin->assignRole('admin');
        $user->assignRole('user');
    }
}
