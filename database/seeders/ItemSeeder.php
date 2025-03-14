<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Item;
use App\Models\User;
use Illuminate\Support\Facades\DB;

class ItemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // IDをリセットしてからダミーデータを作成
        DB::table('items')->truncate(); 

        $userIds = User::pluck('id')->toArray(); // ユーザーID一覧を取得

        Item::factory()->count(50)->create([ // 50件のダミーデータを作成
                'user_id' => function () use ($userIds) {
                    return collect($userIds)->random(); // ランダムに user_id を選択
                }
        ]);
    }
}
