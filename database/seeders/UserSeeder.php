<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'name' => 'support admin',
            'email' => 'admin@support.lk',
            'password' => md5('admin@123'),
            'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
        ]);
    }
}
