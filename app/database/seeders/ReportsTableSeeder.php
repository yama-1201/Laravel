<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //サンプル
        DB::table('reports')->insert([
            'review_id'=>1,
            'user_id'=>1,
            'comment'=>'',
            'created_at'=>Carbon::now(),
        ]);
    }
}
