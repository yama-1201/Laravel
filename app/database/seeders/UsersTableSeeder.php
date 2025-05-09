<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // factory
        \App\Models\User::factory()->count(20)->create();

        //サンプル
        // DB::table('users')->insert([
        //     'name'=>'tanaka',
        //     'email'=>'tanaka@test.com',
        //     'password'=>'tanaka',
        //     'del_flg'=>0,
        //     'role'=>1,
        //     'created_at'=>Carbon::now(),
        //     'updated_at'=>Carbon::now(),
        // ]);
    }
}
