<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class discountCodeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 10; $i++) {
            DB::table('discount_codes')->insert(
                [
                    'name' => 'HOT SALE' . $i,
                    'describe' => 'Không gian phòng chờ được thiết kế phân cách bằng mảng xanh, khu vườn yên tĩnh, cửa gỗ đan mây, đủ khéo léo để tôn trọng tính riêng tư cho người sử dụng mà vẫn thuận lợi kết nối với kiến trúc tổng thể.',
                    'start_time' => Carbon::now(),
                    'end_time' => Carbon::now(),

                    'discount_rate' => rand(10, 50),
                    'created_at' => Carbon::now(),
                    'updated_at' => Carbon::now(),

                ]
            );
        }
    }
}
