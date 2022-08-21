<?php

namespace Database\Seeders;

use App\Models\typeRoom;
use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class roomSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        for ($i = 0; $i < 16; $i++) {
            DB::table('rooms')->insert(
                [
                    'name' => 'P' . 30 . $i,
                    'image' => 'https://hoatuoi360.vn/uploads/file/h%C3%ACnh-%E1%BA%A3nh-hoa-sen-%C4%91%E1%BA%B9p.jpg',
                    'describe' => 'Không gian phòng chờ được thiết kế phân cách bằng mảng xanh, khu vườn yên tĩnh, cửa gỗ đan mây, đủ khéo léo để tôn trọng tính riêng tư cho người sử dụng mà vẫn thuận lợi kết nối với kiến trúc tổng thể.',
                    'created_at' => Carbon::now(),
                    'type_room_id' => typeRoom::all()->random()->id,
                    'updated_at' => Carbon::now(),
                ]
            );
        }
    }
}
