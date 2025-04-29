<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class ReviewsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //サンプル
        $params=[
            [
                'user_id'=>1,
                'store_id'=>1,
                'title'=>'すき家の牛丼',
                'content'=>'玉ねぎが多めの牛丼。甘め。',
                'rating'=>3,
                'is_hedden'=>0,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'user_id'=>1,
                'store_id'=>2,
                'title'=>'吉野家の牛丼',
                'content'=>'お肉が多めの牛丼。量も細かく分かれている。',
                'rating'=>4,
                'is_hedden'=>0,
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
        ];

        foreach ($params as $param){
            DB::table('reviews')->insert($param);
        }
    }
}
