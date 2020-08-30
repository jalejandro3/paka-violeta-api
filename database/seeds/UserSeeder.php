<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;

use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::whereEmail('admin@laravelrestapi.com')->first();

        if (! $user) {
            User::create([
                'username' => 'admin',
                'first_name' => 'User',
                'last_name' => 'Admin',
                'email' => 'admin@pakavioleta.test',
                'password' => Hash::make('Admin1234.'),
                'email_verified_at' => Carbon::now()->toDate()
            ]);
        }
    }
}
