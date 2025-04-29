<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class BookmarksTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //サンプル
        DB::table('bookmarks')->insert([
            'user_id'=>1,
            'store_id'=>2,
            'created_at'=>Carbon::now(),
        ]);
    }
}
