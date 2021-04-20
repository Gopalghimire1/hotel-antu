<?php

namespace Database\Seeders;

use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->username = 'Super Admin';
        $user->email = 'admin@admin.com';
        $user->password = bcrypt('admin');
        $user->dob = Carbon::now();
        $user->role = 0;
        $user->save();
    }
}
