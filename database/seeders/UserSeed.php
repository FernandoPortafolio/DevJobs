<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Date;
use Illuminate\Support\Facades\Hash;

class UserSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = new User();
        $user->name = 'Fernando Acosta';
        $user->email = 'fernando@gmail.com';
        $user->password = Hash::make('123');
        $user->email_verified_at = date('Y-m-d H:m:s');
        $user->save();
    }
}
