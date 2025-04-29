<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;

class StoresTableSeeder extends Seeder
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
                'name'=>'すき家',
                'image_path'=>'https://www.sukiya.jp/menu/',
                'description'=>'牛丼屋さんです。新作はナポ牛です。ぜひ、食べに来てください！',
                'address'=>'埼玉県所沢市下新井1454-3',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
            [
                'user_id'=>1,
                'name'=>'吉野家',
                'image_path'=>'https://www.yoshinoya.com/menu/gyudon/gyu-don/',
                'description'=>'牛丼屋さんです。おすすめはプルコギ牛丼です。ぜひ、食べに来てください！',
                'address'=>'埼玉県所沢市けやき台1-13-6',
                'created_at'=>Carbon::now(),
                'updated_at'=>Carbon::now(),
            ],
        ];
        foreach ($params as $param){
            DB::table('stores')->insert($param);
        }
    }
}
